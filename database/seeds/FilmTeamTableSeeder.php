<?php

use Illuminate\Database\Seeder;

class FilmTeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FilmTeam::class,20)->create();
    }
}
