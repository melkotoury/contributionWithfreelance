<?php

use Illuminate\Database\Seeder;

class FilmThemeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FilmTheme::class,20)->create();
    }
}
