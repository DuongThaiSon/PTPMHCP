<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $table = 'cities';
    protected $guarded = ['id'];
    protected $fillable = [
        'city_id', 'name', 'country', 'coord'
    ];

    public function weatherdaily(){
        return $this->hasMany('App\WeatherDaily', 'city_id', 'city_id');
    }
}
