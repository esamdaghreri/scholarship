<?php

use Illuminate\Database\Seeder;

class JobDescriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_descriptions')->insert([
            ['name_en' => 'Dean', 'name_ar' => 'العميد'],
            ['name_en' => "Dean's Office Director", 'name_ar' => 'مدير مكتب العميد'],
            ['name_en' => 'Vice Deanship for Quality and Development', 'name_ar' => 'وكيل الكلية للجودة والتطوير'],
            ['name_en' => 'Dean Secretary', 'name_ar' => 'سكرتير مكتب العميد'],
            ['name_en' => 'Vice Deanship of Higher Education and Scientific Research', 'name_ar' => 'وكيل الكلية للتعليم العالي والبحث العلمي'],
            ['name_en' => 'Vice Deanship for Academic and Educational Affairs', 'name_ar' => 'وكيل الكلية للشؤون الأكاديمية والتعليمية'],
            ['name_en' => 'Vice Deanship for Student Affairs', 'name_ar' => 'وكيل الكلية لشؤون الطلاب'],
            ['name_en' => 'Administrative Communications', 'name_ar' => 'الاتصالات الادارية	'],
            ['name_en' => 'Public Relations', 'name_ar' => 'العلاقات العامة'],
            ['name_en' => 'Finance Officer', 'name_ar' => 'موظف الشؤون المالية	'],
            ['name_en' => 'Manager Assistant', 'name_ar' => 'مساعد اداري'],
            ['name_en' => 'Faculty Affairs', 'name_ar' => 'شؤون أعضاء هيئة التدريس'],
            ['name_en' => 'Employees Affairs', 'name_ar' => 'شؤون الموظفين'],
            ['name_en' => 'Manager Director', 'name_ar' => 'مدير الادارة'],
            ['name_en' => 'Warehouse employee', 'name_ar' => 'موظف مستودع'],

        ]);
    }
}
