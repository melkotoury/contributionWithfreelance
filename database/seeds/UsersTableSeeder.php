<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds
     *
     * @return void
     */
    public function run()
    {
		
  //      factory(App\User::class,10)->create(['type' => 'film_maker']);
        \App\User::create([

            'fullname' => 'Root Cave',
            'type' => 'admin',
            'email' => 'info@rootcave.com',
            'username' => 'rootcave',
            'password' => bcrypt(123456)

            ]);
    
    }
}
