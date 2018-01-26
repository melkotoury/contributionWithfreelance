<?php

use Illuminate\Database\Seeder;

class FilmDirectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FilmDirector::class,20)->create();
    }
}
