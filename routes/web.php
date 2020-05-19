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

Route::get('login', function (){
    return view('admin.views.login.login');
})->name('get-login');
Route::post('login','AdminController@postLogin')->name('postLogin');
Route::get('logout','AdminController@getLogout')->name('get-logout');

Route::get('search',[
	'as'=>'search',
	'uses'=>'HomeController@search'
]);

Route::get('/update-weather', [
	'as' => 'updateWeather',
	'uses' => 'CrawlController@crawlDaily'
]);
Route::get("/update-city", 'CrawlController@crawlCity');
Route::get('/fetch-current', 'CrawlController@crawlCurrent');

Route::get('/admin', 'AdminController@dashboard');

Route::get('/clear-database', 'CrawlController@clearDatabase');
Route::get('/admin/weather-daily', 'AdminWeatherDailyController@index');
Route::get('/admin/cities', 'AdminCityController@index');
Route::get('/admin/weather-hourly/{cityid}/{dailyid}', 'AdminWeatherHourlyController@index');

Route::get('/admin/editWeatherDaily/{id}','AdminWeatherDailyController@getEdit')->name('get-edit-daily');
Route::post('/admin/editWeatherDaily/{id}','AdminWeatherDailyController@postEdit')->name('post-edit-daily');

Route::post('admin/deleteweatherhourly/{id}','AdminWeatherHourlyController@postDelete');

Route::get('/admin/editWeatherHourly/{id}','AdminWeatherHourlyController@getEdit')->name('get-edit-hourly');
Route::post('/admin/editWeatherHourly/{id}','AdminWeatherHourlyController@postEdit')->name('post-edit-hourly');
