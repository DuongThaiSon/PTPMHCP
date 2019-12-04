<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTypeColumnsInWeatherHourlyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weather_hourly', function (Blueprint $table) {
            $table->double("rh")->change();
            $table->double("snow")->change();
            $table->double("wind_dir")->change();
            $table->double("precip")->change();
            $table->double("clouds")->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weather_hourly', function (Blueprint $table) {
            $table->integer("rh")->change();
            $table->integer("snow")->change();
            $table->integer("wind_dir")->change();
            $table->integer("precip")->change();
            $table->integer("clouds")->change();
        });
    }
}
