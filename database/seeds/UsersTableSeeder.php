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
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => "Name" ,
            'email' => "name@gmail.com",
            'last_name' => "Surname",
            'phone_number' => "123456789",
            'address' => "Mojkovac, Montenegro",
            'validated' => 0,
            'photo' => "default.png",
            'role' => "superadmin",
            'status' => "active",
            'account_type' => "premium",
            'password' => md5('admin')
        ]);

        DB::table('users')->insert([
            'name' => "Name 1" ,
            'email' => "name1@gmail.com",
            'last_name' => "Surname1",
            'phone_number' => "987654321",
            'address' => "Mostar 88000, Bosnia and Herzegovina",
            'validated' => 0,
            'photo' => "default.png",
            'role' => "superadmin",
            'status' => "active",
            'account_type' => "premium",
            'password' => md5('admin1')
        ]);
    }
}
