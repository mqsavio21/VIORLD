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
            'email' => 'admin@example.com',
            'team_id' => 1,
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Coach',
            'email' => 'coach@example.com',
            'team_id' => 1,
            'role' => 'coach',
        ]);
    }
}
