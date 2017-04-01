<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id');
            $table->string('phone_number');
            $table->string('street');
            $table->string('city');
            $table->string('country');
            $table->string('website');
            $table->integer('register_nb')->unique();
            $table->string('mbbs_uni');
            $table->string('phd_uni');
            $table->string('field');
            $table->string('notes');
            $table->string('gender');
            $table->string('date');
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
        Schema::drop('doctor_details');
    }
}
