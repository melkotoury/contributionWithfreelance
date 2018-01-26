<?php

use Illuminate\Database\Seeder;

class SiteSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $site = \App\SiteSetting::firstOrCreate(['id' => 1]);
        $site->film_fees = 75;
        $site->currency = 'USD';
        $site->save();
    }
}
