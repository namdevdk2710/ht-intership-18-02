<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $value) {
            CiTy::create([
                'name' => $faker->city(),
            ]);
        }
    }
}
