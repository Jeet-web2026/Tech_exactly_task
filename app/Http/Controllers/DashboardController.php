<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminDashboard(): View
    {
        $user = User::where('user_type', 'user')->count();
        return view('admin.dashboard', compact('user'));
    }

    public function adminPosts(): View
    {
        return view('admin.post');
    }
    public function adminUsers(): View
    {
        $users = User::where('user_type', 'user')->get();
        return view('admin.users', compact('users'));
    }

    public function Userdelete(int $uid): RedirectResponse
    {
        $user = User::findOrFail($uid);
        $user->delete();
        return back()->with('success', 'User deleted successfully.');
    }

    public function Useredit(int $uid): View
    {
        $userDetail = User::findOrFail($uid);
        return view('admin.user-edit', compact('userDetail'));
    }
}
