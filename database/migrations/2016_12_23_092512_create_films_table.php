<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {

            $table->increments('id');
            $table->string('original_title');
            $table->string('english_title');
            $table->date('production_date');
            $table->string('film_url');
            $table->text('film_languages');
            $table->text('subtitles_languages');
            $table->text('production_country');
            $table->integer('duration');
            $table->string('film_school');
            $table->boolean('film_school_check');
            $table->boolean('debut_film');
            $table->boolean('work_in_progress');
            $table->boolean('status');
            $table->longText('short_synopsis');
            $table->longText('short_synopsis_english');
            $table->longText('long_synopsis');
            $table->longText('long_synopsis_english');
            $table->string('film_link');
            $table->string('film_password');
            $table->string('film_poster')->default('sowkfko.xsr');
            $table->string('film_still_one')->default('sowkfko.xsr');
            $table->string('film_still_two')->default('sowkfko.xsr');
            $table->string('film_still_three')->default('sowkfko.xsr');
            $table->string('film_still_four')->default('sowkfko.xsr');
            $table->string('director_photo')->default('sowkfko.xsr');
            $table->string('dialogue_list')->default('sowkfko.xsr');
            $table->string('dialogue_list_original');
            $table->string('press_kit')->default('sowkfko.xsr');
            $table->string('press_kit_original');
            $table->string('other_material');
            $table->string('website_url');
            $table->string('facebook_link');
            $table->string('twitter_link');
            $table->string('instagram_link');
            $table->string('vimeo_link');
            $table->string('imdb_link');
            $table->string('trailer_link');
            $table->longText('awards');
            $table->longText('selection');
            $table->integer('completed')->default(0);
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
        Schema::drop('films');
    }
}
