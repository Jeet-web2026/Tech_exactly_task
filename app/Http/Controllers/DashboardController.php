<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $user = User::where('user_type', 'user')->count();
        return view('admin.dashboard', compact('user'));
    }

    public function Dashboard()
    {
        $user = User::where('user_type', 'user')->count();
        return view('user.dashboard', compact('user'));
    }
}
