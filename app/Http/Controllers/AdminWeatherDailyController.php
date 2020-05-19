<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\City;
use App\WeatherDaily;

class AdminWeatherDailyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weather_daily = WeatherDaily::select('cities.name as cityname','weather_daily.city_id as city_id','weather_daily.id as id','datetime','rh','max_wind_spd','wind_gust_spd','clouds','precip_gpm','wind_spd','slp','temp','pres','dewpt','precip','wind_dir','max_temp','min_temp','max_wind_dir','snow')
        ->join('cities','weather_daily.city_id','=','cities.city_id')->get();
        // dd($weather_daily);
        $name = DB::table('cities')->select('*');
        $name = $name->get();
        
        return view('admin.views.weather.weatherDaily',compact('weather_daily','name'));
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
    public function getEdit($id){
        $weather_daily = WeatherDaily::find($id);
        $name = WeatherDaily::select('cities.name as name')
        ->join('cities','weather_daily.city_id','=','cities.city_id')->first();
        $cities = City::all();
        // dd($name);
        // dd($weather_daily);
        return view('admin.views.weather.editWeatherDaily',['weather_daily'=>$weather_daily,'myname'=>$name,'cities'=>$cities]);
    }
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
        $weather_daily = WeatherDaily::find($id);
        $weather_daily->delete();

    }
    public function postEdit(Request $request,$id){
        $weather_daily = WeatherDaily::find($id);
    
        $weather_daily->rh= $request->rh;
        $weather_daily->max_wind_spd= $request->max_wind_spd;
        $weather_daily->wind_gust_spd= $request->wind_gust_spd;
        $weather_daily->clouds= $request->clouds;
        $weather_daily->precip_gpm= $request->precip_gpm;
        $weather_daily->wind_spd= $request->wind_spd;
        $weather_daily->slp= $request->slp;
        $weather_daily->temp= $request->temp;

        $weather_daily->pres= $request->pres;
        $weather_daily->dewpt= $request->dewpt;
        $weather_daily->precip= $request->precip;
        $weather_daily->wind_dir= $request->wind_dir;
        $weather_daily->max_temp= $request->max_temp;
        $weather_daily->min_temp= $request->min_temp;
        $weather_daily->max_wind_dir= $request->max_wind_dir;
        $weather_daily->snow= $request->snow;
        //  dd($weather_daily);
        //  die();
        $weather_daily->save();
        return back()->with("thongbao",'Sửa thành công');
    }
}
