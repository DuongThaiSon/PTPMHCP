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
            $table->dropColumn("rh");
            $table->dropColumn("snow");
            $table->dropColumn("wind_dir");
            $table->dropColumn("precip");
            $table->dropColumn("clouds");
        });
        Schema::table('weather_hourly', function (Blueprint $table) {
            $table->double("rh")->after('city_id');
            $table->double("snow")->after('rh');
            $table->double("wind_dir")->after('snow');
            $table->double("precip")->after('wind_dir');
            $table->double("clouds")->after('precip');
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
            $table->dropColumn("rh");
            $table->dropColumn("snow");
            $table->dropColumn("wind_dir");
            $table->dropColumn("precip");
            $table->dropColumn("clouds");
        });
        Schema::table('weather_hourly', function (Blueprint $table) {
            $table->integer("rh")->after('city_id');
            $table->integer("snow")->after('rh');
            $table->integer("wind_dir")->after('snow');
            $table->integer("precip")->after('wind_dir');
            $table->integer("clouds")->after('precip');
        });
    }
}
