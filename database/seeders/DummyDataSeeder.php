<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a Coach
        $coach = User::updateOrCreate(
            ['email' => 'coach@example.com'],
            [
                'name' => 'Coach Dummy',
                'password' => Hash::make('password'),
                'role' => 'coach',
            ]
        );

        // Create a Team and assign the Coach
        $team = Team::updateOrCreate(
            ['name' => 'VIOR Noctis'],
            [
                'coach_id' => $coach->id,
                'max_players' => 8,
                'description' => 'Dummy Team',
            ]
        );
        
        $coach->team_id = $team->id;
        $coach->save();

        // Create a Player and assign to the Team
        User::updateOrCreate(
            ['email' => 'player@example.com'],
            [
                'name' => 'Player Dummy',
                'password' => Hash::make('password'),
                'role' => 'player',
                'team_id' => $team->id,
            ]
        );

        // Create a Material
        \App\Models\Material::create([
            'title' => 'Test Material',
            'description' => 'This is a test material.',
            'link' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'category' => 'Materi',
            'team_id' => $team->id,
            'created_by' => $coach->id,
        ]);

        // Create a Note
        \App\Models\Note::create([
            'title' => 'Test Note',
            'description' => 'This is a test note.',
            'player_id' => User::where('role', 'player')->first()->id,
            'coach_id' => $coach->id,
            'status' => 'pending',
        ]);

        // Create a Schedule
        \App\Models\Schedule::create([
            'title' => 'Test Schedule',
            'date' => now(),
            'start_time' => now(),
            'end_time' => now()->addHour(),
            'team_id' => $team->id,
            'created_by' => $coach->id,
        ]);

        // Create a PlayerStat
        \App\Models\PlayerStat::create([
            'player_id' => User::where('role', 'player')->first()->id,
            'episode' => '1',
            'act' => '1',
            'month' => '1',
            'peak_rating' => '1',
            'playtime_hours' => 1,
            'wins' => 1,
            'win_rate' => 1,
            'kd_ratio' => 1,
            'hs_percent' => 1,
            'top_agent' => 'Jett',
            'updated_by' => $coach->id,
        ]);
    }
}