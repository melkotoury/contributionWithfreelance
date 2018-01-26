<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmSubtitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_subtitles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->string('name');
            $table->integer('film_id')->unsigned();            
            $table->timestamps();

            $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade')->onUpdate('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('film_subtitles');
    }
}
