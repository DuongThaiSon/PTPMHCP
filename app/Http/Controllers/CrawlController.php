<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use DatePeriod;
use DateInterval;
use App\City;
use DB;
use GuzzleHttp\Client;
use App\WeatherDaily;
use App\WeatherHourly;

class CrawlController extends BaseController
{

    public function clearDatabase ()
    {
        DB::delete('delete from weather_hourly');
        DB::delete('delete from weather_daily');
        // \Carbon\Carbon::createFromFormat('Y-m-d H', implode(" ", explode(':',$value->datetime)))
    }

    public function crawl(Request $request)
    {
        $type = $request->type;
        switch($type) {
            case "daily":
                $this->crawlDaily($request);
                break;
            case "hourly":
                $this->crawlHourly($request);
                break;
            default:
                $this->badRequest("Does not support type");
        }
        $this->success("Success: " + $request->type);
    }

    public function crawlDaily(Request $request)
    {

        // Delete old weather
        
        // DB::delete('delete from weather_hourly');
        // DB::delete('delete from weather_daily');

        ini_set('max_execution_time', 600); //10 minutes
        // Default cities ID
        $defaultCitiesID = [
                            // 1581130,    //hn
                            // 1566083,    //hcm
                            // 1581298,    //haiphong
                            // 1586203,    //can tho
                            // 1587923,    //bien hoa
                            // 1572151,    //nha trang
                            // 1580240,    //hue
                            // 1586896,    //buon ma thuat
                            // 1562798,    //vinh
                            // 1562414,    //vung tau
                            // 1568574,    //quy nhon
                            // 1575627,    //long xuyen
                            // 1566319,    //thai nguyen
                            // 1573517,    //nam dinh
                            // 1568510,    //rach gia
                            // 1565022,    //thu dau mot
                            // 1580410,    //ha long
                            // 1571058,    //phan thiet
                            // 1566166,    //thanh hoa
                            // 1563287,    //tuyenquang
                            // 1591449,    //bac ninh
                            // 1591527,    //bac giang
                            // 1584071,    //da lat
                            // 1581047,    //ha tinh
                            // 1574023,    //my tho
                            // 1562548,    //vinh yen
                            // 1567148,    //tam ky
                            // 1567621,    //son tay
                            // 1571968,    //ninh binh
                            // 1566346,    //thai binh
                            // 1586443,    //ca mau
                            // 1582886,    //dong hoi
                            // 1569684,    //pleiku
                            // 1562820,    //viet tri
                            // 1586185,    //cao bang
                            // 1560349,    //yen bai
                            // 1580830,    //hoa binh
                            // 1580541,    //hoi an
                            // 1581349,    //ha giang
                            // 1578500,    //kon tum
                            // 1567681,    //son la
                            // 1563241,    //uong bi
                            // 1567788,    //soc trang
                            // 1568043,    //sa pa
                            // 1581326,    //hai duong
                            // 1587976,    //ben tre
                        ];

        $datetime = Carbon::now()->toDateTimeString();

        $tenDaysAgo = Carbon::now()->subDays(7);
        $now = Carbon::now();
        // dd($tenDaysAgo);

        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($tenDaysAgo, $interval, $now);

        foreach($defaultCitiesID as $key => $city_id) {
            // dd($period->end);
            foreach ($period as $index => $dt) {
                $date_time_start = $dt->toDateTimeString();
                $date_time_e = $dt->modify('+1 day');
                $date_time_end = $date_time_e->toDateTimeString();
                $date_start = explode(" ", $date_time_start)[0];
                $date_end = explode(" ", $date_time_end)[0];

                // var_dump($date_start);
                // var_dump($date_end);

                $query_params = [
                    'city_id' => $city_id,
                    'start_date' => $date_start,
                    'end_date' => $date_end,
                    'key' => config("app.weatherbit_api_key")
                ];

                $this->fetchWeatherAPI($query_params, 'daily');
            }
        }
        ini_set('max_execution_time', 60); //back to origin
        return $this->success('success');
    }

    public function crawlCity()
    {
        try {
            ini_set('memory_limit', '-1');

            $path = public_path() . "/city.list.json/city.list.json";

            $json = json_decode(file_get_contents($path), true);

            // Delete old cities
            DB::delete('delete from cities');

            $insert_data = [];

            foreach($json as $c) {

                $data = [
                    'city_id' => $c['id'],
                    'name' => $c['name'],
                    'country' => $c['country'],
                    'coord' => json_encode($c['coord']),
                    'region' => array_key_exists('region', $c) ? $c['region'] : 0
                ];

                if ($c['country'] == "VN") {
                    $insert_data[] = $data;
                }
            }

            $insert_data = collect($insert_data); // Make a collection to use the chunk method

            // it will chunk the dataset in smaller collections containing 500 values each.
            // Play with the value to get best result
            $chunks = $insert_data->chunk(500);

            foreach ($chunks as $chunk)
            {
                DB::table('cities')->insert($chunk->toArray());
            }

            return $this->success('success');
        } catch(Exception $e) {
            return $this->internalServer($e);
        }
    }

    private function fetchWeatherAPI($query_params, $type)
    {
        try {
            $url = config('app.weatherbit_domain') . "/v2.0/history/" . $type;

            // Make HTTP Request
            $client = new Client();

            $res = $client->request("GET", $url, [
                'query' => $query_params,
                'verify' => false,
                'timeout' => 20
            ]);

            if($type == "daily") {
                if ($res->getStatusCode() == 200) { // 200 OK
                    $response_data = $res->getBody()->getContents();
                    $data_json = json_decode($response_data);
                    // dd($data_json->city_id);
                    $weather_daily = WeatherDaily::where("city_id", $data_json->city_id)->where("datetime", $data_json->data[0]->datetime)->first();
                    if($weather_daily) {
                        return;
                    }
                    $weather_daily = new WeatherDaily();
                    $weather_daily->city_id = $data_json->city_id;
                    $weather_daily->rh = $data_json->data[0]->rh;
                    $weather_daily->max_wind_spd = $data_json->data[0]->max_wind_spd;
                    $weather_daily->wind_gust_spd = $data_json->data[0]->wind_gust_spd;
                    $weather_daily->clouds = $data_json->data[0]->clouds;
                    $weather_daily->precip_gpm = $data_json->data[0]->precip_gpm;
                    $weather_daily->wind_spd = $data_json->data[0]->wind_spd;
                    $weather_daily->slp = $data_json->data[0]->slp;
                    $weather_daily->temp = $data_json->data[0]->temp;
                    $weather_daily->pres = $data_json->data[0]->pres;
                    $weather_daily->dewpt = $data_json->data[0]->dewpt;
                    $weather_daily->precip = $data_json->data[0]->precip;
                    $weather_daily->wind_dir = $data_json->data[0]->wind_dir;
                    $weather_daily->max_temp = $data_json->data[0]->max_temp;
                    $weather_daily->min_temp = $data_json->data[0]->min_temp;
                    $weather_daily->max_wind_dir = $data_json->data[0]->max_wind_dir;
                    $weather_daily->snow = $data_json->data[0]->snow;
                    $weather_daily->datetime = $data_json->data[0]->datetime;
                    $weather_daily->save();

                    // Crawl hourly
                    $url = config('app.weatherbit_domain') . "/v2.0/history/hourly";

                    // Make HTTP Request
                    $client = new Client();

                    $res = $client->request("GET", $url, [
                        'query' => $query_params,
                        'verify' => false,
                        'timeout' => 20
                    ]);

                    if ($res->getStatusCode() == 200) { // 200 OK
                        $response_data = $res->getBody()->getContents();
                        $data_json = json_decode($response_data);

                        foreach($data_json->data as $key1 => $value) {
                            $weather_hourly = new WeatherHourly();
                            $weather_hourly->city_id = $data_json->city_id;
                            $weather_hourly->weather_daily_id = $weather_daily->id;
                            $weather_hourly->rh = $value->rh;
                            $weather_hourly->wind_spd = $value->wind_spd;
                            $weather_hourly->vis = $value->vis;
                            $weather_hourly->slp = $value->slp;
                            $weather_hourly->pod = $value->pod;
                            $weather_hourly->pres = $value->pres;
                            $weather_hourly->dewpt = $value->dewpt;
                            $weather_hourly->snow = $value->snow;
                            $weather_hourly->wind_dir = $value->wind_dir;
                            $weather_hourly->weather = json_encode($value->weather);
                            $weather_hourly->app_temp = $value->app_temp;
                            $weather_hourly->temp = $value->temp;
                            $weather_hourly->precip = $value->precip;
                            $weather_hourly->clouds = $value->clouds;
                            $weather_hourly->datetime = \Carbon\Carbon::createFromFormat('Y-m-d H', implode(" ", explode(':',$value->datetime)));
                            // print_r($weather_hourly);die;
                            $weather_hourly->save();
                        }

                    }


                }
            }
        } catch(Exception $e) {
            return;
        }
    }

    private function fetchCurrentWeather($query_params) {
        try {
            $url = config('app.weatherbit_domain') . "/v2.0/current";

            // Make HTTP Request
            $client = new Client();

            $res = $client->request("GET", $url, [
                'query' => $query_params,
                'verify' => false,
                'timeout' => 20
            ]);
            if ($res->getStatusCode() == 200) { // 200 OK
                $response_data = $res->getBody()->getContents();
                $data_json = json_decode($response_data);
                // dd($data_json);
                $weather_daily = WeatherDaily::where("city_id", $data_json->city_id)->where("datetime", $data_json->data[0]->datetime)->first();
                if($weather_daily) {
                    return;
                }

                // Crawl hourly
                $url = config('app.weatherbit_domain') . "/v2.0/history/hourly";

                // Make HTTP Request
                $client = new Client();

                $res = $client->request("GET", $url, [
                    'query' => $query_params,
                    'verify' => false,
                    'timeout' => 20
                ]);

                if ($res->getStatusCode() == 200) { // 200 OK
                    $response_data = $res->getBody()->getContents();
                    $data_json = json_decode($response_data);

                    foreach($data_json->data as $key1 => $value) {
                        $weather_hourly = new WeatherHourly();
                        $weather_hourly->city_id = $data_json->city_id;
                        $weather_hourly->weather_daily_id = $weather_daily->id;
                        $weather_hourly->rh = $value->rh;
                        $weather_hourly->wind_spd = $value->wind_spd;
                        $weather_hourly->vis = $value->vis;
                        $weather_hourly->slp = $value->slp;
                        $weather_hourly->pod = $value->pod;
                        $weather_hourly->pres = $value->pres;
                        $weather_hourly->dewpt = $value->dewpt;
                        $weather_hourly->snow = $value->snow;
                        $weather_hourly->wind_dir = $value->wind_dir;
                        $weather_hourly->weather = json_encode($value->weather);
                        $weather_hourly->app_temp = $value->app_temp;
                        $weather_hourly->temp = $value->temp;
                        $weather_hourly->precip = $value->precip;
                        $weather_hourly->clouds = $value->clouds;
                        $weather_hourly->datetime = $value->datetime;
                        $weather_hourly->save();
                    }

                }
            }
        } catch(Exception $e) {
            return;
        }
    }
}
