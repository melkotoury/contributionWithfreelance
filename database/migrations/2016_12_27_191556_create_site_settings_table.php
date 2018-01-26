<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            
            $table->increments('id');
            $table->bigInteger('fees')->default(0);
            $table->bigInteger('film_fees')->default(0);
            $table->string('currency')->default('USD');
            $table->string('secret_key')->default('test_sec_k_16dc38ad730d6ba806a92');
            $table->string('open_key')->default('test_open_k_c3f462a1e8277114c1da');
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('site_settings');
    }
}
