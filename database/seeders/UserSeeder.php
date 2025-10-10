<?php

namespace Database\Seeders;

use App\Models\Team;
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
                'team_id' => $i <= 3 ? $i : 4, // Assign coaches 4 and 5 to VIOR Academy
            ]);
        }

        // Assign Coaches to Teams
        Team::where('name', 'VIOR Noctis')->update(['coach_id' => User::where('username', 'coach1')->first()->id]);
        Team::where('name', 'VIOR Erevos')->update(['coach_id' => User::where('username', 'coach2')->first()->id]);
        Team::where('name', 'VIOR Reverie')->update(['coach_id' => User::where('username', 'coach3')->first()->id]);
        Team::where('name', 'VIOR Academy')->update(['coach_id' => User::where('username', 'coach4')->first()->id]);

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
