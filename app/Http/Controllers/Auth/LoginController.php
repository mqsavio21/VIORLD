<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        session()->forget('url.intended');

        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();


        if ($user->role === 'admin') {
            return redirect()->intended('/admin');
        } elseif ($user->role === 'coach') {
            return redirect()->intended('/coach');
        }

        return redirect()->intended('/dashboard');
    }

}