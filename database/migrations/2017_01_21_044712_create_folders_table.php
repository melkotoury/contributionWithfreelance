<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folders', function (Blueprint $table) {

            $table->increments('id');
            $table->string('en_name');
//            $table->string('es_name');
            $table->integer('edition');
//            $table->boolean('type');
            $table->boolean('sub');
            $table->integer('parent')->default(0);
            $table->integer('festival_id')->unsigned();            
            $table->timestamps();

            $table->foreign('festival_id')->references('id')->on('festivals')
                                          ->onDelete('cascade')
                                          ->onUpdate('cascade'); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('folders');
    }
}
