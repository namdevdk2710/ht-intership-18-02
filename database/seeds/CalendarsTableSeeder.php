<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Calendar;

class CalendarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $communes = App\Models\Commune::all();
        $users = App\Models\User::whereIn('role', [1, 2])->pluck('id')->all();
        foreach (range(1, 20) as $index) {
            Calendar::create([
                'user_id' => $faker->randomElement($users),
                'commune_id' => $faker->randomElement($communes->pluck('id')->toArray()),
                'time' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = '+1 years', $timezone = null),
                'address' => $faker->streetAddress(),
            ]);
        }
    }
}
