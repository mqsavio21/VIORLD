<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'role:player'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\Auth\AdminLoginController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'create'])->name('login');
    Route::post('/login', [AdminLoginController::class, 'store']);
});

use App\Http\Controllers\Auth\CoachLoginController;

Route::prefix('coach')->name('coach.')->group(function () {
    Route::get('/login', [CoachLoginController::class, 'create'])->name('login');
    Route::post('/login', [CoachLoginController::class, 'store']);
});

Route::post('/admin/logout', \App\Http\Controllers\Auth\LogoutController::class)->name('admin.logout');
Route::post('/coach/logout', \App\Http\Controllers\Auth\LogoutController::class)->name('coach.logout');
