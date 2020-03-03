<?php

use Illuminate\Database\Seeder;

class GeneralSpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('general_specializations')->insert([
            ['name_en' => 'Information System', 'name_ar' => 'نظم المعلومات'],
            ['name_en' => 'Computer Science', 'name_ar' => 'علوم الحاسب'],
            ['name_en' => 'Computer Engineering & Networks', 'name_ar' => 'هندسة و شبكات الحاسب'],
        ]);
    }
}
