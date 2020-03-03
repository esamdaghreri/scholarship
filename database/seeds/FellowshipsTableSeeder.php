<?php

use Illuminate\Database\Seeder;

class FellowshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fellowships')->insert([
            ['name_en' => 'Data Sciene', 'name_ar' => 'علم البيانات'],
            ['name_en' => 'Security', 'name_ar' => 'الحماية'],
            ['name_en' => 'Software Engineering', 'name_ar' => 'هندسة البرمجيات'],
            ['name_en' => 'Web Developer', 'name_ar' => 'مطور ويب'],
            ['name_en' => 'Mobile App Developer', 'name_ar' => 'مطور تطبيق جوال'],
        ]);
    }
}
