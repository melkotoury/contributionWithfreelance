<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       

          $this->call(UsersTableSeeder::class);
          $this->call(CountryTableSeeder::class);      
          $this->call(SiteSettingTableSeeder::class);
        

      //     $this->call(FestivalTableSeeder::class);
      //     $this->call(FilmTableSeeder::class);
      //     $this->call(ContactTableSeeder::class);
      //     $this->call(FestivalCompetetionTableSeeder::class);
      //     $this->call(FilmCategoryTableSeeder::class);
      //     $this->call(FilmGenreTableSeeder::class);
      //     $this->call(FilmThemeTableSeeder::class);
      //     $this->call(FilmDirectorTableSeeder::class);
      //     $this->call(FilmProducerTableSeeder::class);
         
    }
}
