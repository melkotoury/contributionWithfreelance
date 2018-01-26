<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('film_id')->unsigned();            
            $table->integer('amount')->default(0);            
            $table->integer('charge_id');            
            $table->string('charge_state');            
            $table->boolean('elite');             
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
        Schema::drop('transactions');
    }
}
