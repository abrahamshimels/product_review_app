<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Abraham Shimels',
                'email' => 'abraham@example.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Rediet Bekele',
                'email' => 'rediet@example.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Yonatan Tadesse',
                'email' => 'yonatan@example.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Lily Solomon',
                'email' => 'lily@example.com',
                'password' => Hash::make('password123'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
