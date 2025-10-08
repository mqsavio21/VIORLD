<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Destroy an authenticated session.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $user = $request->user();

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($user) {
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.login');
                case 'coach':
                    return redirect()->route('coach.login');
                default:
                    return redirect()->route('login');
            }
        }

        return redirect('/');
    }
}
