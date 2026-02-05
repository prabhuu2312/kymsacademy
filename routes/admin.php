<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;

Route::prefix('admin')->name('admin.')->group(function () {

    // Login page (GET)
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');

    // Login POST
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');

    // Dashboard
<<<<<<< HEAD
    Route::view('dashboard', 'admin.dashboard.dashboard')->name('dashboard');
=======
    Route::get('dashboard', function () {
        return view('admin.dashboard.index');
    })->name('dashboard');
>>>>>>> 0bd2682344e9d36e5358bddb6a7fc43588f162d2

    // Logout
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
