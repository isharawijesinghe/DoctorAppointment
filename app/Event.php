<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * @var
     */
    protected $doctor_name;
    protected $doctor_id;
    protected $start_time;
    protected $end_time;

    /**
     * @methods
     */

    public function setDoctorName($doctorname){
        $this->doctor_name=$doctorname;
    }

    public function getDoctorName(){
        return $this->doctor_name;
    }

    public function setDoctorId($doctorid){
        $this->doctor_id=$doctorid;
    }

    public function getDoctorId(){
        return $this->doctor_id;
    }

    public function setStarttime($starttime){
        $this->start_time=$starttime;
    }

    public function getStarttime(){
        return $this->start_time;
    }

    public function setEndttime($endtime){
        $this->end_time=$endtime;
    }

    public function getEndtime(){
        return $this->end_time;
    }
}
