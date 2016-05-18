<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobpostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobposts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Job_cmpny_name');
            $table->string('location');
            $table->string('Job_title');
            $table->string('Job_description');      
            $table->date('Job_post_date');
            $table->date('Job_expiry_date');
            $table->string('job_salary');
            $table->string('Employment_type');
            $table->string('Contract_type');
            $table->string('Industry');
            $table->string('Function');         
            $table->string('Job_experience1');
            $table->string('Job_experience2');
            $table->string('Job_type');
            $table->string('Job_qualification');
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
        Schema::drop('jobposts');
    }
}
