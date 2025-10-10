<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::create(['name' => 'VIOR Noctis']);
        Team::create(['name' => 'VIOR Erevos']);
        Team::create(['name' => 'VIOR Reverie']);
        Team::create(['name' => 'VIOR Academy']);
    }
}
