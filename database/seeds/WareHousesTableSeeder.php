<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class WareHousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 15; $i++) {
            DB::table('ware_houses')->insert([
                'name' => $faker->name,
                'address' =>  $faker->streetAddress(),
                'created_at' =>now(),
                'updated_at' =>now(),
            ]);
        }
    }
}
