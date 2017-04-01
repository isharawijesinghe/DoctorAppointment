<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorDetails extends Model
{
    
    
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
