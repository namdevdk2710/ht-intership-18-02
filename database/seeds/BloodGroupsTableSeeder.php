<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BloodGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 2; $i++) {
            DB::table('blood_groups')->insert([
                'name' => $faker->randomElement($array = array ('A','B')),
                'created_at' =>now(),
                'updated_at' =>now(),
            ]);
        }
    }
}
