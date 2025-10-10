<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\PlayerStat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $materials = Material::all();
        $playerStat = PlayerStat::where('player_id', $user->id)->latest()->first();


        return view('dashboard', compact('user', 'materials', 'playerStat'));
    }
}
