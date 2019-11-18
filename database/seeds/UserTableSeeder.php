<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = [
            "slug" => "admin",
            "name" => "Admin",
        ];

        // Sentinel::getRoleRepository()->createModel()->fill($role_admin)->save();

        $adminrole = Sentinel::findRoleByName('Admin');

        $user_admin = [
            "first_name" => "Admin",
            "last_name" => "Rizal",
            "email" => "admin@mail.com",
            "password" => "admin"
        ];

        // $adminuser = Sentinel::registerAndActivate($user_admin);

        // $adminuser->roles()->attach($adminrole);

        $role_writer = [
            "slug" => "visitor",
            "name" => "visitor",
        ];

        Sentinel::getRoleRepository()->createModel()->fill($role_writer)->save();

        $writerrole = Sentinel::findRoleByName('visitor');

        $writeruser = [
            "first_name" => "Rizal",
            "last_name" => "Nugraha",
            "email" => "rzlnugraha@gmail.com",
            "password" => "password",
        ];

        $writeruser = Sentinel::registerAndActivate($writeruser);

        $writeruser->roles()->attach($writerrole);
    }
}
