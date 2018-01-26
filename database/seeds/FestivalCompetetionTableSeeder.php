<?php

use Illuminate\Database\Seeder;

class FestivalCompetetionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FestivalCompetetion::class,20)->create();
    }
}
