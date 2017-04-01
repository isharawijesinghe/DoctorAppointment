<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * @var
     */
    
    public $role;

    /**
     * @set methods
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_role', 'role_id', 'user_id');
    }

    public function setRole($role){
        $this->role=$role;
    }

    public function getRole(){
        return $this->role;
    }
    

}
