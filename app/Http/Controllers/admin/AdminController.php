<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Show admin login form
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Handle admin login request
     */
    public function login(Request $request)
    {
        // 1. Validate input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // 2. Check credentials (TEMPORARY - hardcoded)
        $validUsername = 'admin';
        $validPassword = 'admin123';

        if ($request->username === $validUsername && $request->password === $validPassword) {
            // 3. Set admin session
            session([
                'admin_logged_in' => true,
                'admin_username' => $request->username,
                'admin_login_time' => now()
            ]);

            // 4. Redirect to dashboard
            return redirect()->route('admin.dashboard');
        }

        // 5. If credentials wrong
        return back()
            ->withInput($request->only('username'))
            ->withErrors([
                'username' => 'Invalid username or password.',
            ]);
    }

    /**
     * Handle admin logout
     */
    public function logout(Request $request)
    {
        // 1. Clear all admin session data
        $request->session()->forget([
            'admin_logged_in',
            'admin_username',
            'admin_login_time'
        ]);

        // 2. Invalidate session
        $request->session()->invalidate();

        // 3. Regenerate CSRF token
        $request->session()->regenerateToken();

        // 4. Redirect to login page
        return redirect()->route('admin.login');
    }
}
