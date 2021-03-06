<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('search',[
	'as'=>'search',
	'uses'=>'HomeController@search'
]);

Route::get('/update-weather', 'CrawlController@crawlDaily');
Route::get("/update-city", 'CrawlController@crawlCity');
Route::get('/fetch-current', 'CrawlController@crawlCurrent');

Route::get('/admin', 'AdminController@dashboard');

Route::get('/clear-database', 'CrawlController@clearDatabase');
Route::get('/admin/weather-daily', function (){
    return view('admin.views.weather-list.weather-daily');
});
Route::get('/admin/weather-hourly', function (){
    return view('admin.views.weather-list.weather-hourly');
});
