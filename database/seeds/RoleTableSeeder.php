<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'slug' => 'admin',
            'name' => 'admin',
            'permissions' => 'All Backend',
            // 'slug' => 'visitor',
            // 'name' => 'visitor',
            // 'permissions' => 'Information'
        ]);
    }
}
