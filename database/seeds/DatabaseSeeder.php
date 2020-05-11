<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CollegesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(UniversitiesTableSeeder::class);
        $this->call(GendersTableSeeder::class);
        $this->call(QualificationsTableSeeder::class);
        $this->call(RegisterationTypeTableSeeder::class);
        $this->call(ScholarshipReasonsSeeder::class);
        $this->call(NationalitiesTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(FellowshipsTableSeeder::class);
        $this->call(GeneralSpecializationsTableSeeder::class);
        $this->call(JobDescriptionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RegisterScholarshipTableSeeder::class);
        $this->call(CancelScholarshipTableSeeder::class);
        $this->call(ExtendScholarshipTableSeeder::class);
        $this->call(ChangeFellowshipScholarshipTableSeeder::class);
        $this->call(ChangeSupervisorScholarshipTableSeeder::class);
        $this->call(LanguageScholarshipTableSeeder::class);
    }
}
