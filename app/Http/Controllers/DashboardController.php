<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $player = auth()->user()->player;
        $materials = Material::all();

        return view('dashboard', compact('player', 'materials'));
    }
}
