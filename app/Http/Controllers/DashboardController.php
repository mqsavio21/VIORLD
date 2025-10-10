<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\PlayerStat;
use App\Models\Schedule;
use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $materials = Material::whereHas('creator', function ($query) use ($user) {
            $query->where('team_id', $user->team_id);
        })->get();
        $playerStat = PlayerStat::where('player_id', $user->id)->latest()->first();
        $schedules = Schedule::where('team_id', $user->team_id)->get();
        $tasks = Task::where('assigned_to', $user->id)->get();


        return view('dashboard', compact('user', 'materials', 'playerStat', 'schedules', 'tasks'));
    }
}
