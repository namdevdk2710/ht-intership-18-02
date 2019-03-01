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
        DB::table('users')->insert([
            [
                'id' => 1,
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 1,
                'created_at' => now(),
                'updated_at' =>  now()
            ],
            [
                'id' => 2,
                'username' => 'staff',
                'email' => 'staff@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 2,
                'created_at' =>  now(),
                'updated_at' =>  now()
            ],
            [
                'id' => 3,
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 0,
                'created_at' =>  now(),
                'updated_at' =>  now()
            ]
        ]);
    }
}
