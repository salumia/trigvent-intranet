<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();           
            $table->integer('role')->default(2);
            $table->integer('status')->default(1);
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('father_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender');
            $table->string('image')->nullable();
            $table->string('personal_email_address');
            $table->string('official_email_address')->nullable();
            $table->string('mobile_no');
            $table->string('alternate_no')->nullable();
            $table->string('address')->nullable();
            $table->string('temporary_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('employee_code');
            $table->integer('department_id');
            $table->integer('designation_id');
            $table->date('joining_date');
            $table->date('relieving_date');
            $table->string('skype_id')->nullable();
            $table->integer('last_year_accrued_leaves');
            $table->integer('last_month_accrued_leaves');
            $table->string('bank_account_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_ifsc_code')->nullable();
            $table->string('username');
            $table->string('password');
            $table->string('notes')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
