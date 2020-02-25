<?php

use Illuminate\Database\Seeder;

class RegisterationTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('registeration_types')->insert([
            ['name_en' => 'Registeration on a scholarship', 'name_ar' => 'التسجيل في البعثة'],
            ['name_en' => 'Scholarship extension', 'name_ar' => 'تمديد البعثة'],
            ['name_en' => 'Cancellation of the scholarship', 'name_ar' => 'الغاء البعثة'],
        ]);
    }
}
