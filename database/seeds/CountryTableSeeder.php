<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       foreach (countryTable() as $key => $value) {
       	 
       	 $count = new \App\Country();
       	 $count->name = $key;
       	 $count->code = $value;
       	 $count->save();
       }
    }
}
