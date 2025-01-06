<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 0, // Admin
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Farreldeh',
                'email' => 'customer@example.com',
                'password' => Hash::make('password'),
                'role' => 1, // Customer
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
