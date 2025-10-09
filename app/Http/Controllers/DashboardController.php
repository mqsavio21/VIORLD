<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $materials = Material::all();

        if ($user->role === 'player') {
            $player = $user->player;
            return view('dashboard', compact('player', 'materials'));
        }

        return view('dashboard', compact('user', 'materials'));
    }
}
