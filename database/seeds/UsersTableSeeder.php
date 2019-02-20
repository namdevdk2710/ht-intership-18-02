<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTime = date('Y-m-d H:i:s');
        DB::table('users')->insert([
            [
                'id'=>1,
                'username'=> 'Admin',
                'email'=>'admin@gmail.com',
                'password'=> bcrypt('123456'),
                'role' =>1,
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                'id'=>2,
                'username'=> 'donor',
                'email'=>'donor@gmail.com',
                'password'=> bcrypt('123456'),
                'role' =>0,
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                'id'=>3,
                'username'=> 'staff',
                'email'=>'staff@gmail.com',
                'password'=> bcrypt('123456'),
                'role' =>2,
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ],
            [
                'id'=>4,
                'username'=> 'receiver',
                'email'=>'receiver@gmail.com',
                'password'=> bcrypt('123456'),
                'role' =>0,
                'created_at'=>$currentTime,
                'updated_at'=>$currentTime
            ]
        ]);
    }
}
