<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'Patient')->first();
        $role_doctor = Role::where('name', 'Doctor')->first();
        $role_admin = Role::where('name', 'Administrator')->first();

        $user = new User();
        $user->first_name = 'Victor';
        $user->last_name = 'Visitor';
        $user->email = 'visitor@example.com';
        $user->password = bcrypt('visitor');
        $user->save();
        $user->roles()->attach($role_user);

        $admin = new User();
        $admin->first_name = 'Alex';
        $admin->last_name = 'Admin';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $doctor = new User();
        $doctor->first_name = 'Andy';
        $doctor->last_name = 'Author';
        $doctor->email = 'author@example.com';
        $doctor->password = bcrypt('author');
        $doctor->save();
        $doctor->roles()->attach($role_doctor);
    }
}
