<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            ['name_en' => 'Accepted', 'name_ar' => 'قبلت'],
            ['name_en' => 'Denaied', 'name_ar' => 'رفض'],
            ['name_en' => 'On progress', 'name_ar' => 'قيد التنفيذ'],
        ]);
    }
}
