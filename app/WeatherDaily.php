<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\WeatherHourly;

class WeatherDaily extends Model
{
    protected $table = 'weather_daily';
    protected $guarded = ['id'];
    protected $fillable = [
        'city_id'
    ];

    public function hourly() {
        return $this->hasMany(WeatherHourly::class);
    }

    public function city(){
        return $this->belongsTo('App\City', 'city_id', 'city_id');
    }
}
