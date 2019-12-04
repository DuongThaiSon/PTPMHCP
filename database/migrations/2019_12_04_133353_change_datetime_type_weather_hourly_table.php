<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDatetimeTypeWeatherHourlyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weather_hourly', function (Blueprint $table) {
            $table->dropColumn("datetime");
        });
        Schema::table('weather_hourly', function (Blueprint $table) {
            $table->date("datetime")->after('clouds');
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
            $table->dropColumn("datetime");
        });
        Schema::table('weather_hourly', function (Blueprint $table) {
            $table->dateTime("datetime")->after('clouds');
        });
    }
}
