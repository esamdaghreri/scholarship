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
            ['name_en' => 'College Supervisor', 'name_ar' => 'مشرف الكلية'],
            ['name_en' => 'University Supervisor', 'name_ar' => 'مشرف الجامعة'],
            ['name_en' => 'Scholarship', 'name_ar' => 'مبتعث'],
        ]);
    }
}
