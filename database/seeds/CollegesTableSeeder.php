<?php

use Illuminate\Database\Seeder;

class CollegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colleges')->insert([
            ['name_en' => 'Computer Sciences and Information Systems', 'name_ar' => 'علوم الحاسب وتقنية المعلومات'],
            ['name_en' => 'Medicine', 'name_ar' => 'الطب'],
            ['name_en' => 'Dentistry', 'name_ar' => 'طب الأسنان'],
            ['name_en' => 'Pharmacy', 'name_ar' => 'الصيدلة'],
            ['name_en' => 'Applied Medical Sciences', 'name_ar' => 'العلوم الطبية التطبيقية'],
            ['name_en' => 'Science', 'name_ar' => 'العلوم'],
            ['name_en' => 'Public Health and Tropical Medicine', 'name_ar' => 'الصحة العامة وطب المناطق الحارة'],
            ['name_en' => 'Engineering', 'name_ar' => 'الهندسة'],
            ['name_en' => 'Business Administration', 'name_ar' => 'إدارة الأعمال'],
            ['name_en' => 'Education', 'name_ar' => 'التربية'],
            ['name_en' => 'Sharia and law', 'name_ar' => 'الشريعة والقانون'],
            ['name_en' => 'Arts and Humanities', 'name_ar' => 'الآداب والعلوم الإنسانية'],
            ['name_en' => 'Architecture and Design', 'name_ar' => 'التصميم والعمارة'],
            ['name_en' => 'Community', 'name_ar' => 'المجتمع'],
            ['name_en' => 'Applied Industrial Technology (CAIT)', 'name_ar' => 'التطبيقات الصناعية'],
            ['name_en' => 'College Abo Arish', 'name_ar' => 'الكلية بأبو عريش'],
            ['name_en' => 'College Sabya', 'name_ar' => 'الكلية الجامعية بصبيا'],
            ['name_en' => 'Science and Arts in Darb', 'name_ar' => 'الكلية بمحافظةالدرب'],
            ['name_en' => 'Science and Arts in Farasan', 'name_ar' => 'الكلية بمحافظة فرسان'],
            ['name_en' => 'Science and Arts in Samtah', 'name_ar' => 'الكلية بمحافظة صامطة'],
            ['name_en' => 'Science and Arts in Al-Aarda', 'name_ar' => 'الكلية بمحافظةالعارضة'],
            ['name_en' => 'Science and Arts in Dair', 'name_ar' => 'الكلية بمحافظةالداير'],
        ]);
    }
}
