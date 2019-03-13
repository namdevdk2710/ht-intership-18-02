<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class InformationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $users = App\Models\User::all();
        $bloods = App\Models\BloodGroup::all();
        $communes = App\Models\Commune::all();
        foreach ($users as $user)
            DB::table('information')->insert([
                'name' => $faker->name,
                'gender' => $faker->randomElement([0, 1]),
                'dob' =>$faker->date,
                'cmnd' =>  $faker->numberBetween($min = 100000000, $max = 999999999),
                'address' =>  $faker->streetAddress(),
                'phone' => $faker->numberBetween($min = 100000000, $max = 999999999),
                'user_id' =>  $user->id,
                'blood_id' => $faker->randomElement($bloods->pluck('id')->toArray()),
                'commune_id' => $faker->randomElement($communes->pluck('id')->toArray()),
                'created_at' =>now(),
                'updated_at' =>now(),
        ]);
    }
}
