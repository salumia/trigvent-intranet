<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Miscellaneous extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miscellaneous', function (Blueprint $table) {
            $table->id();
            $table->integer('emp_id');   
            $table->enum('item_name', ['icard', 'locker_key']);
            $table->string('value')->nullable();
            $table->integer('is_return')->default('0');
            $table->timestamps(); 
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
