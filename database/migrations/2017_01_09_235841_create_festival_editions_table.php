<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFestivalEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festival_editions', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('number');
            $table->integer('year');
            $table->longText('awards');
            $table->string('path');
            $table->string('edition_poster')->default('sowkfko.xsr');
            $table->text('jury');
            $table->longText('selections');
            $table->integer('festival_id')->unsigned();            
            $table->timestamps();

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
        Schema::drop('festival_editions');
    }
}
