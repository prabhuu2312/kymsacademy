<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

Route::prefix('admin')->name('admin.')->group(function () {

    // Login page (GET)
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');

    // Login POST
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');

    // Dashboard
    Route::view('dashboard', 'admin.dashboard')->name('dashboard');

    // Logout
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});