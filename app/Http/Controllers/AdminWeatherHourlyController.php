<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\City;
use App\WeatherDaily;
use App\WeatherHourly;
use Response;

class AdminWeatherHourlyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cityid,$dailyid)
    {
        $weather_hourly = WeatherHourly::select('weather_hourly.id as hourly_id',
        'cities.name as cityname','weather_daily.city_id as city_id',
        'weather_daily.id as id','weather_hourly.datetime','weather_hourly.rh',
        'weather_hourly.wind_spd','weather_hourly.vis','weather_hourly.slp',
        'weather_hourly.pod','weather_hourly.pres','weather_hourly.dewpt',
        'weather_hourly.snow','weather_hourly.wind_dir','weather_hourly.weather','weather_hourly.app_temp',
        'weather_hourly.temp','weather_hourly.precip','weather_hourly.clouds')
        ->join('weather_daily','weather_daily.id','=','weather_hourly.weather_daily_id')
        ->join('cities','weather_daily.city_id','=','cities.city_id')
        ->where('cities.city_id',$cityid)->where('weather_hourly.weather_daily_id',$dailyid)->get();
      
        return view('admin.views.weather.weatherHourly',compact('weather_hourly'));
    }

    public function getEdit($id){
        $weather_hourly = WeatherHourly::find($id);
        $name = WeatherHourly::select('cities.name as name')
        ->join('cities','weather_hourly.city_id','=','cities.city_id')->first();
        $cities = City::all();
        // dd($name);
        // dd($weather_hourly);
        return view('admin.views.weather.editWeatherHourly',['weather_hourly'=>$weather_hourly,'myname'=>$name,'cities'=>$cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postDelete($id){
        $weather_hourly = WeatherHourly::find($id);
        $weather_hourly->delete();
        // $weather_hourly->save();
        $response = array(
            "data"=>"data"
        );
        return Response::json($response);
    }

    public function postEdit(Request $request,$id){
        $weather_hourly = WeatherHourly::find($id);
    
        $weather_hourly->rh= $request->rh;
        $weather_hourly->wind_spd= $request->wind_spd;
        $weather_hourly->vis= $request->vis;
        $weather_hourly->slp= $request->slp;
        $weather_hourly->pres= $request->pres;
        $weather_hourly->dewpt= $request->dewpt;
        $weather_hourly->snow= $request->snow;
        $weather_hourly->wind_dir= $request->wind_dir;

        $weather_hourly->app_temp= $request->app_temp;
        $weather_hourly->temp= $request->temp;
        $weather_hourly->precip= $request->precip;
        $weather_hourly->clouds= $request->clouds;
        //  dd($weather_daily);
        //  die();
        $weather_hourly->save();
        return back()->with("thongbao",'Sửa thành công');
    }
}
