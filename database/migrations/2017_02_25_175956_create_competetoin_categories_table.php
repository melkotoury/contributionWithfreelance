<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetetoinCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competetoin_categories', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');            
            $table->integer('competetion_id')->unsigned();            
          //  $table->integer('festival_id')->unsigned();            
            $table->timestamps();

            $table->foreign('competetion_id')->references('id')->on('festival_competetions')->onDelete('cascade')->onUpdate('cascade'); 

            // $table->foreign('festival_id')->references('id')->on('festivals')->onDelete('cascade')->onUpdate('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('competetoin_categories');
    }
}
