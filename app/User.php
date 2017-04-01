<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * @var for test user class model
     */
    protected $first_name;
    protected $last_name;
    protected $email;

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id');
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

  

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    
    public function isDoctor()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'Doctor')
            {
                return true;
            }
        }

        return false;
    }

    public function isAdmin()
    {
        foreach ($this->roles()->get() as $role)
        {
            if ($role->name == 'Administrator')
            {
                return true;
            }
        }

        return false;
    }

    /**
     * for tset for User class model
     */
    public function setFirstName($firstname){
        $this->first_name=$firstname;
    }

    public function getFirstName(){
        return $this->first_name;
    }

    public function setLastName($lastname){
        $this->last_name=$lastname;
    }

    public function getLastName(){
        return $this->last_name;
    }
    
      public function setEmail($email){
          $this->email=$email;
      }

    public function getEmail(){
        return $this->email;
    }
}
