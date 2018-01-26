<?php

use Illuminate\Database\Seeder;

class FilmDistributionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FilmDistribution::class,20)->create();
    }
}
