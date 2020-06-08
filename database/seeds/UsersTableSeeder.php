<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'first_name' => 'Admin',
                    'second_name' => 'Scholarship',
                    'third_name' => 'Esam',
                    'fourth_name' => 'Daghreri',
                    'email' => 'admin@gmail.com',
                    'username' => 'admin',
                    'password' => Hash::make('AdminScholarship'),
                    'birthdate' => date("Y-m-d H:i:s", rand(1010000000,5478965899)),
                    'phone' => rand(10000000, 9999999999),
                    'telephone' => rand(10000000, 9999999999),
                    'national_number' => rand(10000000, 9999999999),
                    'employee_number' => rand(10000000, 9999999999),
                    'date_of_joining_the_university' => date("Y-m-d H:i:s", rand(1010000000,5478965899)),
                    'role_id' => 1,
                    'gender_id' => 1,
                    'nationality_id' => rand(1, 5),
                    'highest_qualification_id' => 2,
                    'graduation_country_id' => rand(1, 184),
                    'graduation_university_id' => rand(1, 6),
                    'graduation_college_id' => rand(1, 20),
                    'department_id' => rand(1, 3),
                    'general_specialization_id' => rand(1, 3),
                    'job_description_id' => rand(1, 14),
                    'fellowship_id' => rand(1, 6),
                    'email_verified_at' => '2020-12-29 03:01:21',
                    'created_by' => rand(1, 20),
                    'created_at' => date("Y-m-d H:i:s", rand(1262055681,1334567899)),
                ],
            ]
        );
    }
}