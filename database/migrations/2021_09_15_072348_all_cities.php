<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AllCities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {    
      Schema::create('all_cities', function (Blueprint $table) {
        $table->id();
        $table->string('city_name');
        $table->string('city_code');
        $table->string('state_code');

      });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
