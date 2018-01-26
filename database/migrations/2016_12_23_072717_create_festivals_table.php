<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFestivalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festivals', function (Blueprint $table) {
            
            $table->increments('id');
            $table->longText('desc');
            $table->string('logo_url')->default('sowkfko.xsr');
            $table->date('deadline');
            $table->date('festival_duration_from');
            $table->date('festival_duration_to');
            $table->string('accepted_categories');
            $table->string('country');
            $table->string('address');
            $table->string('city');
            $table->text('film_type');
            $table->LongText('biography');
            $table->LongText('awards');
            $table->string('website_url');
            $table->string('facebook_url');
            $table->string('linkedin_url');
            $table->string('instagram_url');
            $table->string('youtube_url');
            $table->string('vimeo_url');
            $table->string('imdb_url');            
            $table->LongText('team');
            $table->integer('edition');
            $table->string('phone');
            $table->integer('max_film_duration');
            $table->float('fees');
            $table->boolean('confirmed');
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); 
                   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('festivals');
    }
}

