<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\RequestBlood;

class RequestBloodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = App\Models\User::all();
        $calendars = App\Models\Calendar::all();
        foreach (range(1, 200) as $value) {
            RequestBlood::create([
                'user_id' => $faker->randomElement($users->pluck('id')->toArray()),
                'calendar_id' => $faker->randomElement($calendars->pluck('id')->toArray()),
                'content'=> $faker->text(100),
                'status' => $faker->randomElement([True, False]),
                'type' => $faker->randomElement(['cho', 'nhan']),
            ]);
        }
    }
}
