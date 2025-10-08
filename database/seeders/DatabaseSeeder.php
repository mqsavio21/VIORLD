<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TeamSeeder::class);

        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'team_id' => 1,
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Coach',
            'username' => 'coach',
            'email' => 'coach@example.com',
            'team_id' => 1,
            'role' => 'coach',
        ]);

        $playerUser = User::factory()->create([
            'name' => 'Player',
            'username' => 'player',
            'email' => 'player@example.com',
            'team_id' => 1,
            'role' => 'player',
        ]);

        \App\Models\Player::factory()->create([
            'name' => 'Player',
            'rank' => 'Unranked',
            'main_role' => 'Duelist',
            'notes' => 'New player',
            'user_id' => $playerUser->id,
            'team_id' => 1,
        ]);
    }
}
