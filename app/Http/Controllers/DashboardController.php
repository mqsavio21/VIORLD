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


        return view('dashboard', compact('user', 'materials'));
    }
}
