<?php

use Illuminate\Database\Seeder;

class FestivalFilmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FestivalFilm::class,20)->create();
    }
}
