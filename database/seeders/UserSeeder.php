<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [];

        for ($i = 1; $i <= 10; $i++) { // Tạo 10 user
            $users[] = [
                'name' => "User $i",
                'email' => "user$i@example.com",
                'phone' => rand(100000000, 999999999), // Random số điện thoại
                'address' => "Address $i",
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('users')->insert($users);
    }
}
