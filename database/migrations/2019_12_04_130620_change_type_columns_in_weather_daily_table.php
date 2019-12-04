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
            $table->dropColumn("rh");
            $table->dropColumn("clouds");
            $table->dropColumn("precip_gpm");
            $table->dropColumn("precip");
            $table->dropColumn("wind_dir");
            $table->dropColumn("max_temp");
            $table->dropColumn("min_temp");
            $table->dropColumn("max_wind_dir");
            $table->dropColumn("snow");
        });
        Schema::table('weather_daily', function (Blueprint $table) {
            $table->double("rh")->after('city_id');
            $table->double("clouds")->after('rh');
            $table->double("precip_gpm")->after('clouds');
            $table->double("precip")->after('precip_gpm');
            $table->double("wind_dir")->after('precip');
            $table->double("max_temp")->after('wind_dir');
            $table->double("min_temp")->after('max_temp');
            $table->double("max_wind_dir")->after('min_temp');
            $table->double("snow")->after('max_wind_dir');
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
            $table->dropColumn("rh");
            $table->dropColumn("clouds");
            $table->dropColumn("precip_gpm");
            $table->dropColumn("precip");
            $table->dropColumn("wind_dir");
            $table->dropColumn("max_temp");
            $table->dropColumn("min_temp");
            $table->dropColumn("max_wind_dir");
            $table->dropColumn("snow");
        });
        Schema::table('weather_daily', function (Blueprint $table) {
            $table->integer("rh")->after('city_id');
            $table->integer("clouds")->after('rh');
            $table->integer("precip_gpm")->after('clouds');
            $table->integer("precip")->after('precip_gpm');
            $table->integer("wind_dir")->after('precip');
            $table->integer("max_temp")->after('wind_dir');
            $table->integer("min_temp")->after('max_temp');
            $table->integer("max_wind_dir")->after('min_temp');
            $table->integer("snow")->after('max_wind_dir');
        });
    }
}
