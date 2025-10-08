<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $materials = Material::where('team_id', auth()->user()->team_id)->get();

        return view('dashboard', compact('materials'));
    }
}
