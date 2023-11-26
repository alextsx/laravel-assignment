<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        //create some users with specific roles
        foreach ([true, false] as $isAdmin) {
            foreach ([true, false] as $isPremium) {
                User::factory()->state([
                    'isAdmin' => $isAdmin,
                    'isPremium' => $isPremium,
                ])->create();
            }
        }
        //and some extra completely randomized users
        $count = random_int(5, 13);
        User::factory()->count($count)->create();

        //and one admin user with specified credentials
        User::factory()->state([
            'name' => 'admin',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'isAdmin' => true,
            'isPremium' => true,
        ])->create();
    }
}