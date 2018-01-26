<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFestivalFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festival_films', function (Blueprint $table) {

            $table->increments('id');
            $table->boolean('status');
            $table->boolean('paid');
            $table->enum('viewed',['not_viewed','watching_now','viewed']);
            $table->integer('festival_id')->unsigned();
            $table->integer('film_id')->unsigned();            
            $table->timestamps();

            $table->foreign('festival_id')->references('id')->on('festivals')->onDelete('cascade')->onUpdate('cascade'); 
            
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
        Schema::drop('festival_films');
    }
}
