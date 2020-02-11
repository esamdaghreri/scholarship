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
        $this->call(DegreesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SpecialistsTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
        $this->call(UniversitiesTableSeeder::class);
    }
}
