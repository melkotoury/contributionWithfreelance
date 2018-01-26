<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waivers', function (Blueprint $table) {

            $table->increments('id');
            $table->string('waiver');
            $table->boolean('active');
            $table->integer('festival_id')->unsigned();            
            $table->string('admin');
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
        Schema::drop('waivers');
    }
}
