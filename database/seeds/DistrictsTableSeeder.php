<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\District;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $cities = App\Models\City::all();
        foreach (range(1, 10) as $value) {
            District::create([
                'name' => $faker->citySuffix(),
                'city_id' => $faker->randomElement($cities->pluck('id')->toArray()),
            ]);
        }
    }
}
