<?php

use Illuminate\Database\Seeder;

class ScholarshipReasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     // Number 1 means true and number 0 means false
    public function run()
    {
        DB::table('scholarship_reasons')->insert([
            ['name_en' => 'The study did not suit me', 'name_ar' => 'الدراسة لم تناسبني', 'cancel' => 1, 'extend' => 0],
            ['name_en' => 'Illness', 'name_ar' => 'مرض', 'cancel' => 1, 'extend' => 1],
            ['name_en' => 'other', 'name_ar' => 'آخر', 'cancel' => 1, 'extend' => 1],
        ]);
    }
}
