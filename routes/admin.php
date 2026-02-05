<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;

Route::prefix('admin')->name('admin.')->group(function () {

    // Login page (GET)
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');

    // Login POST
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');

    // Dashboard
    Route::get('dashboard', function () {
        return view('admin.dashboard.index');
    })->name('dashboard');

    // Logout
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
