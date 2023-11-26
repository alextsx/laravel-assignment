<?php

namespace Database\Seeders;

use App\Models\SearchHistory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SearchHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = random_int(5, 100);
        $users = User::all();
        for ($i = 0; $i < $count; $i++) {
            $user = $users->random();
            SearchHistory::factory()->state([
                'user_id' => $user->id,
            ])->create();
        }
    }
}
