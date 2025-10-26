<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function adminDashboard(): View
    {
        $user = User::where('user_type', 'user')->count();
        $posts = Post::count();
        return view('admin.dashboard', compact('user', 'posts'));
    }

    public function adminPosts(): View
    {
        $page = request()->get('page', 1);
        $cacheKey = 'admin_posts_page_' . $page;

        $posts = Cache::remember($cacheKey, now()->addMinutes(10), function () {
            return Post::with('user')
                ->paginate(5);
        });
        return view('admin.post', compact('posts'));
    }
    public function adminUsers(): View
    {
        $page = request()->get('page', 1);
        $cacheKey = 'admin_users_page_' . $page;

        $users = Cache::remember($cacheKey, now()->addMinutes(10), function () {
            return User::where('user_type', 'user')
                ->paginate(6);
        });
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

    public function Userdetailssave(UserEditRequest $request, int $id): RedirectResponse
    {
        $permissions = [
            'post' => in_array('post', $request->permissions ?? []),
            'comment' => in_array('comment', $request->permissions ?? []),
        ];
        $user = User::updateOrCreate(
            ['id' => $id],
            [
                'fname' => $request->input('fname'),
                'lname' => $request->input('lname'),
                'email' => $request->input('email'),
                'status' => $request->input('status'),
                'permissions' => $permissions,
            ]
        );
        if (!$user) {
            return redirect()->back()->with('error', 'Failed to update user details.');
        }
        return redirect()->back()->with('success', 'User details updated successfully.');
    }
}
