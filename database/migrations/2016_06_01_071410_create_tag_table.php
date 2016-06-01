<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->timestamps();
        });

        //pivote table for Awards and Tags table intermediate table with two column.
        Schema::create('awards_tag', function (Blueprint $table) {
            $table->increments('id');
            
            //awards id
            $table->integer('awards_id')->unsigned()->index();
            $table->foreign('awards_id')->references('id')->on('awards')->onDelete('cascade');

            //tags id
            $table->integer('tag_id')->unsigned()->index();
            $table->foreign('tag_id')->references('id')->on('Tags')->onDelete('cascade');

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
        Schema::drop('Tags');
        Schema::drop('Award_Tag');
    }
}
