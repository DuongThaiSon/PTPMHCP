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
        // Default cities ID
        // Hai Phong, Thanh Hoa, HCM 
        $defaultCitiesID = [1581298, 1566166, 1566083];
        $ct = City::where('city_id', 1581130)->get();
        $north = WeatherDaily::orderBy('datetime', 'asc')->where('city_id', $defaultCitiesID[0])->limit(1)->get();
        $central = WeatherDaily::orderBy('datetime', 'asc')->where('city_id', $defaultCitiesID[1])->limit(1)->get();
        $south = WeatherDaily::orderBy('datetime', 'asc')->where('city_id', $defaultCitiesID[2])->limit(1)->get();
        
        return view('client.index', compact("weathers_daily","ct", "north", "central", "south", "list_city"));
        
    }

    public function search(Request $request){
        $city = City::where('name',$request->key)->firstOrFail();
        $weathers_daily = WeatherDaily::orderBy('datetime', 'asc')->where('city_id', $city->city_id)->limit(7)->get();
        $nam = $city->name;
        return view('client.search',compact('nam',"weathers_daily"));
    }
}
