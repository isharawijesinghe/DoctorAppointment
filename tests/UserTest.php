<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{

    /**
     * Using set up method to create common user class
     */

    public function setUp()
    {
        $this->user = new \App\User;
    }


    /**
     * A basic functional user class test example.
     *
     * @return void
     */
    public function testGetEmail(){


        $this->user->setEmail('ishara@wijesinghe.com');

        $this->assertEquals($this->user->getEmail(),'ishara@wijesinghe.com');

    }
   

    public function testGetFirstName(){

        $this->user->setFirstName('ishara');

        $this->assertEquals($this->user->getFirstName(),'ishara');

    }

    public function testGetLastName(){

        $this->user->setLastName('wijesinghe');

        $this->assertEquals($this->user->getLastName(),'wijesinghe');

    }

   
  
}
