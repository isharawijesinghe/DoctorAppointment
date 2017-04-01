<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoleTest extends TestCase
{

    /**
     * Using set up method to create common user class
     */

    public function setUp()
    {
        $this->user = new \App\Role;
    }


    /**
     * A basic functional role class test example.
     *
     * @return void
     */
    public function testGetRole(){


        $this->user->setRole('Patient');

        $this->assertEquals($this->user->getRole(),'Patient');

    }





}
