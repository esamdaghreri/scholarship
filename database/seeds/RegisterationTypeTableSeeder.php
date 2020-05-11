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
            ['name_en' => 'Registeration on a scholarship', 'name_ar' => 'التسجيل في البعثة', 'table_name' => 'register_scholarships', 'model_name' => 'RegisterScholarship'],
            ['name_en' => 'Scholarship extension', 'name_ar' => 'تمديد البعثة', 'table_name' => 'extend_scholarships', 'model_name' => 'ExtendScholarship'],
            ['name_en' => 'Cancellation of the scholarship', 'name_ar' => 'إنهاء البعثة', 'table_name' => 'cancel_scholarships', 'model_name' => 'CancelScholarship'],
            ['name_en' => 'Change supervisor of the scholarship', 'name_ar' => 'تغيير مشرف البعثة', 'table_name' => 'change_supervisor_scholarships', 'model_name' => 'ChangeSupervisorScholarship'],
            ['name_en' => 'Change fellowship of the scholarship', 'name_ar' => 'تغيير التخصص البعثة', 'table_name' => 'change_fellowship_scholarships', 'model_name' => 'ChangeFellowshipScholarship'],
            ['name_en' => 'Language Scholarship', 'name_ar' => 'بحثة لغة', 'table_name' => 'register_scholarships', 'model_name' => 'LanguageScholarship'],
        ]);
    }
}
