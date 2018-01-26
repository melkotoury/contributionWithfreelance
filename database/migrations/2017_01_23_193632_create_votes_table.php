<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('film_id')->unsigned();            
            $table->text('content');   
            $table->integer('festival_id')->unsigned();                                 
            $table->integer('programmer_id')->unsigned();                                 
            $table->timestamps();

            $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade')->onUpdate('cascade'); 

            $table->foreign('festival_id')->references('id')->on('festivals')->onDelete('cascade')->onUpdate('cascade'); 

            $table->foreign('programmer_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); 


       });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('votes');
    }
}
