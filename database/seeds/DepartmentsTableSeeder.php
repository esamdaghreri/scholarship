<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            ['name_en' => 'Information System Department', 'name_ar' => 'قسم نظم المعلومات'],
            ['name_en' => 'Computer Science Department', 'name_ar' => 'قسم علوم الحاسب'],
            ['name_en' => 'Computer Engineering & Networks Department', 'name_ar' => 'قسم هندسة و شبكات الحاسب'],
        ]);
    }
}
