<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Commune;

class CommunesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $districts = App\Models\District::all();
        foreach (range(1, 100) as $value) {
            Commune::create([
                'name' => $faker->streetName(),
                'district_id' => $faker->randomElement($districts->pluck('id')->toArray()),
            ]);
        }
    }
}
