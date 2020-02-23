<?php

use Illuminate\Database\Seeder;

class UniversitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universities')->insert([
            ['name_en' => 'Jazan University', 'name_ar' => 'جامعة جازان'],
            ['name_en' => 'Putra Malaysia University', 'name_ar' => 'جامعة بوترا ماليزيا'],
            ['name_en' => 'California Institute of Technology', 'name_ar' => 'معهد كاليفورنيا للتكنولوجيا'],
            ['name_en' => 'Stanford University', 'name_ar' => 'جامعة ستانفورد'],
            ['name_en' => 'Princeton University', 'name_ar' => 'جامعة برينستون'],
            ['name_en' => 'Harvard University', 'name_ar' => 'جامعة هارفرد'],
            ['name_en' => 'Oxford University', 'name_ar' => 'جامعة أكسفورد'],
            ['name_en' => 'Cambridge University', 'name_ar' => 'جامعة كامبريدج'],
            ['name_en' => 'Malaya University', 'name_ar' => ''],
        ]);
    }
}
