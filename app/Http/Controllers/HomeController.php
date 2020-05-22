<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WeatherDaily;
use App\City;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $weathers_daily = WeatherDaily::orderBy('datetime', 'asc')->where('city_id', 1581130)->limit(7)->get();
        $list_city = WeatherDaily::get()->unique('city_id')->load(['city']);
        return view('client.index', compact("weathers_daily", "list_city"));
    }

    public function search(Request $request){
        $city = City::where('name',$request->key)->firstOrFail();
        $weathers_daily = WeatherDaily::orderBy('datetime', 'asc')->where('city_id', $city->city_id)->limit(7)->get();
        $name = $city->name;
        return view('client.search',compact('name',"weathers_daily"));
    }
}
