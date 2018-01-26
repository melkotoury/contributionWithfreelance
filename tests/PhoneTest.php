<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PhoneTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testPhoneNumberOnly()
{
    $this->visit('/festival/signup')
         ->type('0100', 'phone')
         ->check('terms')
         ->press('Register')
         ->seePageIs('/dashboard');
}
}
