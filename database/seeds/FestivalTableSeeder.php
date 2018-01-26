<?php

use Illuminate\Database\Seeder;

class FestivalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Festival::class,1000)->create();
    }
}
