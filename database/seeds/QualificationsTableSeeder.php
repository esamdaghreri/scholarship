<?php

use Illuminate\Database\Seeder;

class QualificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('qualifications')->insert([
            ['name_en' => 'diploma', 'name_ar' => 'دبلوم'],
            ['name_en' => 'bachelor', 'name_ar' => 'بكالوريوس'],
            ['name_en' => 'master', 'name_ar' => 'ماجستير'],
            ['name_en' => 'Doctorate', 'name_ar' => 'دكتوراه'],
        ]);
    }
}
