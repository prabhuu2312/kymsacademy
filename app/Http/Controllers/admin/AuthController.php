<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show login page
    public function showLoginForm()
    {
        return view('admin.auth.login'); // Blade file path
    }

    // Process login form
    public function login(Request $request)
    {
        // Validate form input
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt login with admin guard
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate(); // Prevent session fixation
            return redirect()->route('admin.dashboard');
        }

        // Failed login
        return back()->withErrors([
            'username' => 'Invalid username or password.',
        ])->onlyInput('username');
    }

    // Logout admin
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}