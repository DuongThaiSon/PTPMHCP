<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function dashboard(Request $request) {
        return view('admin.views.home.index');
    }
    public function postLogin(Request $request){
        if (Auth::attempt(['email'=>$request->Email,'password'=>$request->Pass])) {
            return view ('admin.views.home.index');
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
