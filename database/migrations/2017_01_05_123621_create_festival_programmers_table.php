<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFestivalProgrammersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festival_programmers', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned();            
            $table->integer('festival_id')->unsigned();            
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
             
            $table->foreign('festival_id')->references('id')->on('festivals')->onDelete('cascade')->onUpdate('cascade'); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('festival_programmers');
    }
}
