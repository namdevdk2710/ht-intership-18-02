<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PostsTableSeeder extends Seeder
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
        foreach ($users as $user)
            DB::table('posts')->insert([
                'title' => $faker->text(20),
                'content' => $faker->text(250),
                'user_id' =>  $user->id,
                'created_at' =>now(),
                'updated_at' =>now(),
        ]);
    }
}
