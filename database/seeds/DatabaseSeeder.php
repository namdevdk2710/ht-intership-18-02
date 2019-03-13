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
        $this->call(TodosTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(CommunesTableSeeder::class);
        $this->call(CalendarsTableSeeder::class);
        $this->call(RequestBloodsTableSeeder::class);
        $this->call(BloodGroupsTableSeeder::class);
        $this->call(InformationsTableSeeder::class);
    }
}
