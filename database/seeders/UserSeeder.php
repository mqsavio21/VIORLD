<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create CEO
        User::create([
            'name' => 'CEO',
            'username' => 'ceo',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create Coaches
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => 'Coach ' . $i,
                'username' => 'coach' . $i,
                'password' => Hash::make('password'),
                'role' => 'coach',
            ]);
        }

        // Assign Coaches to Teams
        User::where('username', 'coach1')->update(['team_id' => 1]);
        User::where('username', 'coach2')->update(['team_id' => 2]);
        User::where('username', 'coach3')->update(['team_id' => 3]);
        User::where('username', 'coach4')->update(['team_id' => 4]);
        User::where('username', 'coach5')->update(['team_id' => 4]);

        // Create Players
        for ($i = 1; $i <= 4; $i++) {
            User::create([
                'name' => 'Player ' . $i,
                'username' => 'player' . $i,
                'password' => Hash::make('password'),
                'role' => 'player',
                'team_id' => $i,
            ]);
        }
    }
}
