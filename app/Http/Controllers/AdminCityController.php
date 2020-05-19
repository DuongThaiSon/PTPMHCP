<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use App\City;

class AdminCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = DB::table('cities')->select('*');
        $city = $city->get();
        return view('admin.views.weather.cities',compact('city'));
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
        $city = City::find($id);
        $city->delete();
        $response = array(
            "data"=>"data"
        );
        return Response::json($response);
    }

    public function getEdit($id){
        $city = City::find($id);
        $cities = City::all();
        // dd($name);
        // dd($weather_hourly);
        return view('admin.views.weather.editCity',['city'=>$city,'cities'=>$cities]);
    }

    public function postEdit(Request $request,$id){
        $city = City::find($id);
    
        $city->name= $request->name;
        $city->region= $request->region;
        $city->country= $request->country;
        //  dd($weather_daily);
        //  die();
        $city->save();
        return back()->with("thongbao",'Sửa thành công');
    }
}
