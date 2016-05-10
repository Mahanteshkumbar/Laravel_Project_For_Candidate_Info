<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();           
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('profiles', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lname');
            $table->string('uname');
            $table->string('mnum');
            $table->date('dob');
            $table->string('status');
            $table->string('country');
            $table->string('email');
            $table->string('state');
            $table->string('city');
            $table->string('addrno');
            $table->integer('users_id')->unsigned()->nullable();
            $table->foreign('users_id')->references('id')->on('users');
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
        Schema::drop('educations');
        Schema::drop('profiles');
        Schema::drop('users');
        
    }
}
