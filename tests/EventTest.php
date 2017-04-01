<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventTest extends TestCase
{

    /**
     * Using set up method to create common user class
     */

    public function setUp()
    {
        $this->user = new \App\Event;
    }


    /**
     * A basic functional event class test example.
     *
     * @return void
     */
    public function testGetDoctorName(){


        $this->user->setDoctorName('yyy');

        $this->assertEquals($this->user->getDoctorName(),'yyy');

    }


    public function testGetDoctorId(){


        $this->user->setDoctorId(5);

        $this->assertEquals($this->user->getDoctorId(),5);

    }

    public function testGetStartTime(){


        $this->user->setStarttime("2011/07/09:12:00:09");

        $this->assertEquals($this->user->getStarttime(),"2011/07/09:12:00:09");

    }

    public function testGetEndTime(){


        $this->user->setEndttime("2011/07/09:12:00:09");
        
        $this->assertEquals($this->user->getEndtime(),"2011/07/09:12:00:09");

    }
    
}
