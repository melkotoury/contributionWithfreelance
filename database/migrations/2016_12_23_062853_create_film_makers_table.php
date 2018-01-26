<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmMakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_makers', function (Blueprint $table) {
            
            $table->increments('id');
            $table->longText('biography');
            $table->longText('filmography');
            $table->text('Profession');
            $table->string('photo')->default('sowkfko.xsr');
            $table->string('facebook_url');
            $table->string('linkedin_url');
            $table->string('instagram_url');
            $table->string('youtube_url');
            $table->string('vimeo_url');
            $table->string('imdb_url');
            $table->longText('awards');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('country_in_map');
            $table->date('birthdate');
            $table->enum('gender',['male','female']);
            $table->string('phone');
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
        Schema::drop('film_makers');
    }
}
