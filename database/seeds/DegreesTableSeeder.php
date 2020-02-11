<?php

use Illuminate\Database\Seeder;

class DegreesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('degrees')->insert([
            ['name_en' => 'Bachelor', 'name_ar' => 'البكالوريوس'],
            ['name_en' => 'Master', 'name_ar' => 'الماجستير'],
            ['name_en' => 'Doctoral', 'name_ar' => 'الدكتوراه'],
        ]);
    }
}
