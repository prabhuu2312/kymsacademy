<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance
     */
    public function __construct()
    {
        // Apply admin check to all methods in this controller
        $this->middleware(function ($request, $next) {
            if (!session('admin_logged_in')) {
                return redirect()->route('admin.login')
                    ->with('error', 'Please login first.');
            }
            return $next($request);
        });
    }

    /**
     * Show admin dashboard
     */
    public function index()
    {
        return view('admin.dashboard.index');
    }
}
