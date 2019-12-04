<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTypeColumnsInWeatherDailyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weather_daily', function (Blueprint $table) {
            $table->double("rh")->change();
            $table->double("clouds")->change();
            $table->double("precip_gpm")->change();
            $table->double("precip")->change();
            $table->double("wind_dir")->change();
            $table->double("max_temp")->change();
            $table->double("min_temp")->change();
            $table->double("max_wind_dir")->change();
            $table->double("snow")->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weather_daily', function (Blueprint $table) {
            $table->integer("rh")->change();
            $table->integer("clouds")->change();
            $table->integer("precip_gpm")->change();
            $table->integer("precip")->change();
            $table->integer("wind_dir")->change();
            $table->integer("max_temp")->change();
            $table->integer("min_temp")->change();
            $table->integer("max_wind_dir")->change();
            $table->integer("snow")->change();
        });
    }
}
