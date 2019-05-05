<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'username' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => bcrypt('123456'),
                'role' =>  $faker->randomElement([0, 1, 2]),
                'created_at' =>now(),
                'updated_at' =>now(),
            ]);
        }
    }
}
