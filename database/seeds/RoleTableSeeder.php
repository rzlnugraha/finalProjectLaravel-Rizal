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
            'slug' => 'visitor',
            'name' => 'Visitor',
            'permissions' => 'Visitor',
            // 'slug' => 'visitor',
            // 'name' => 'visitor',
            // 'permissions' => 'Information'
        ]);
    }
}
