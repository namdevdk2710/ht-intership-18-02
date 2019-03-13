
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

        for ($i = 0; $i < 50; $i++) {
            DB::table('information')->insert([
                'name' => $faker->name,
                'gender' => $faker->randomElement([0, 1]),
                'dob' =>$faker->date,
                'cmnd' =>  $faker->randomNumber(),
                'address' =>  $faker->streetAddress(),
                'phone' => $faker->randomNumber(),
                'user_id' =>  $faker->randomElement($users->pluck('id')->toArray()),
                'blood_id' => $faker->randomElement($bloods->pluck('id')->toArray()),
                'commune_id' => $faker->randomElement($communes->pluck('id')->toArray()),
                'created_at' =>now(),
                'updated_at' =>now(),
            ]);
        }
    }
}
