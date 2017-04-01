<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FieldTest extends TestCase
{

    /**
     * Using set up method to create common user class
     */

    public function setUp()
    {
        $this->user = new \App\Field;
    }


    /**
     * A basic functional field class test example.
     *
     * @return void
     */
    public function testGetField(){


        $this->user->setField('Neuro');

        $this->assertEquals($this->user->getField(),'Neuro');

    }





}
