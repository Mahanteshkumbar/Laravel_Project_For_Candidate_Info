<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
           $table->increments('id');
          $table->string('Company_name'); 
          $table->string('Start_year');
          $table->string('End_year');
          $table->string('Work_history_id');
          $table->string('Designation');
          $table->string('Exp_summary');
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
        Schema::drop('experiences');
    }
}
