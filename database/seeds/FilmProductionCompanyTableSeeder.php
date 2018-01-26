<?php

use Illuminate\Database\Seeder;

class FilmProductionCompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FilmProductionCompany::class,20)->create();
    }
}
