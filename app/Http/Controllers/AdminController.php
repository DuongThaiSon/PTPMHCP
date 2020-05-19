<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\WeatherDaily;


class AdminController extends Controller
{
    public function dashboard(Request $request) {
        $max_temp = WeatherDaily::join('cities','weather_daily.city_id','=','cities.city_id')
        ->where('name','Ha Noi')->max('max_temp');

        $min_temp = WeatherDaily::join('cities','weather_daily.city_id','=','cities.city_id')
        ->where('name','Ha Noi')->min('min_temp');

        $avg_rh = WeatherDaily::join('cities','weather_daily.city_id','=','cities.city_id')
        ->where('name','Ha Noi')->avg('rh');
        
        $avg_precip = WeatherDaily::join('cities','weather_daily.city_id','=','cities.city_id')
        ->where('name','Ha Noi')->avg('precip_gpm');
       
        return view('admin.views.home.index',['max_temp'=>$max_temp,'min_temp'=>$min_temp,'avg_rh'=>$avg_rh,'avg_precip'=>$avg_precip]);
    }
    public function postLogin(Request $request){
        if (Auth::attempt(['email'=>$request->Email,'password'=>$request->Pass])) {
            return redirect ('admin');
        }
        else {
            return redirect ('login')->with('thongbao','Sai thông tin đăng nhập');
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect ('login');
    }
}
