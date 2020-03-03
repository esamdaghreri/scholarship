<?php

use Illuminate\Database\Seeder;

class NationalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nationalities')->insert([
            ['name_en' => 'Saudi', 'name_ar' => 'سعودي'],
            ['name_en' => 'Sudanese', 'name_ar' => 'سوداني'],
            ['name_en' => 'Egyptian', 'name_ar' => 'مصري'],
            ['name_en' => 'Indian', 'name_ar' => 'هندي'],
            ['name_en' => 'Pakistani', 'name_ar' => 'باكستاني'],
        ]);
    }
}
