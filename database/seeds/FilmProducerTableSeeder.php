<?php

use Illuminate\Database\Seeder;

class FilmProducerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FilmProducer::class,20)->create();
    }
}
