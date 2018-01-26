<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFestivalCompetetionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('festival_competetions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('film_categories');
            $table->text('film_themes');
            $table->text('film_genres');
            $table->text('film_languages');
            $table->text('countries');
            $table->integer('fees')->default(0);
            $table->integer('max_duration');
            $table->date('deadline');
            $table->date('production_date');
            $table->date('comp_from');
            $table->date('comp_to');
            $table->date('submission_begins');
            $table->text('film_lang_subtitle');
            $table->text('accepted_regions');
            $table->longText('requirements');
            $table->string('comp_name');
            $table->boolean('student_only');
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
        Schema::drop('festival_competetions');
    }
}
