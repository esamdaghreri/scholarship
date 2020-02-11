<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Seeds for roles.
     *
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'college_supervisor'],
            ['name' => 'university_supervisor'],
            ['name' => 'scholarship'],
        ]);
    }
}
