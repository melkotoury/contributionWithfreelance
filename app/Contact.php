<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{


	protected $table    = 'contacts';

    protected $fillable = ['name', 'email', 'subject', 'message', 'seen'];


}


// php artisan make:seeder ContactTableSeeder
// php artisan make:seeder FestivalTableSeeder
// php artisan make:seeder FestivalFilmTableSeeder
// php artisan make:seeder FilmTableSeeder

// php artisan make:seeder FilmCategoryTableSeeder

// php artisan make:seeder FilmDirectorTableSeeder

// php artisan make:seeder FilmDistributionTableSeeder

// php artisan make:seeder FilmGenreTableSeeder

// php artisan make:seeder FilmMakerTableSeeder

// php artisan make:seeder FilmProducerTableSeeder

// php artisan make:seeder FilmProductionCompanyTableSeeder

// php artisan make:seeder FilmTeamTableSeeder

// php artisan make:seeder FilmThemeTableSeeder

// php artisan make:seeder SiteSettingTableSeeder
