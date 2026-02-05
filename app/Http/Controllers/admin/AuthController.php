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
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // HARDCODED CREDENTIALS (TEMPORARY)
        $validUsername = 'admin';
        $validPassword = 'admin123';

        if (
            $request->username === $validUsername &&
            $request->password === $validPassword
        ) {

            // Set session manually
            session([
                'admin_logged_in' => true,
                'admin_username' => $request->username,
            ]);

            // Redirect to admin dashboard (admin/dashboard/index.blade.php)
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
        // Clear session manually
        $request->session()->forget(['admin_logged_in', 'admin_username']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
