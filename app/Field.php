<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
   
    /**
     * @var
     */
    public $fieldname;
    
    /**
     * methods
     */
    public function setField($fieldname){
        $this->fieldname=$fieldname;
    }

    public function getField(){
        return $this->fieldname;
    }
    
}
