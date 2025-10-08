<?php

namespace Database\Seeders;

use App\Models\Team;
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
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'super_admin',
        ]);
        $admin->assignRole('super_admin');

        $coach = User::create([
            'name' => 'Coach',
            'email' => 'coach@example.com',
            'password' => Hash::make('password'),
            'role' => 'coach',
        ]);
        $coach->assignRole('coach');

        $team = Team::create([
            'name' => 'VIOR Noctis',
            'coach_id' => $coach->id,
            'max_players' => 8,
            'description' => 'VIOR Noctis Team',
        ]);

        $player = User::create([
            'name' => 'Player',
            'email' => 'player@example.com',
            'password' => Hash::make('password'),
            'role' => 'player',
            'team_id' => $team->id,
        ]);
        $player->assignRole('player');
    }
}
