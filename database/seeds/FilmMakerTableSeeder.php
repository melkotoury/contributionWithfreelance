<?php

use Illuminate\Database\Seeder;

class FilmMakerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FilmMaker::class,500)->create();
    }
}
