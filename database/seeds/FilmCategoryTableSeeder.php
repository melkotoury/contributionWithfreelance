<?php

use Illuminate\Database\Seeder;

class FilmCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FilmCategory::class,20)->create();
    }
}
