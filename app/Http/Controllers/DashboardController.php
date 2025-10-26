<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        $posts->getCollection()->transform(function ($post) {
            $post->content = Str::limit($post->content, 110);
            return $post;
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
        $user->posts()->delete();
        $user->delete();
        $totalPages = ceil(User::count() / 6);
        for ($i = 1; $i <= $totalPages; $i++) {
            Cache::forget('admin_users_page_' . $i);
            Cache::forget('admin_posts_page_' . $i);
        }
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
        $totalPages = ceil(User::count() / 6);
        for ($i = 1; $i <= $totalPages; $i++) {
            Cache::forget('admin_users_page_' . $i);
        }
        return redirect()->back()->with('success', 'User details updated successfully.');
    }

    public function adminPostView(string $slug): View
    {
        $post = Cache::remember("user_post_{$slug}", now()->addMinutes(10), function () use ($slug) {
            return Post::where('slug', $slug)->firstOrFail();
        });
        return view('admin.post-view', compact('post'));
    }

    public function adminPostdelete(int $uid, string $slug): RedirectResponse
    {
        $post = Post::where('id', $uid)->where('slug', $slug)->firstOrFail();
        $post->delete();
        $totalPages = ceil(Post::count() / 5);
        for ($i = 1; $i <= $totalPages; $i++) {
            Cache::forget('admin_posts_page_' . $i);
        }
        return back()->with('success', 'Post deleted successfully.');
    }

    public function adminPostedit(string $slug): View
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('admin.post-edit', compact('post'));
    }

    public function adminPostupdate(Request $request, int $uid, string $slug): RedirectResponse
    {
        $post = Post::where('id', $uid)->where('slug', $slug)->firstOrFail();

        $request->validate([
            'status' => 'required|in:active,inactive',
        ]);

        $post->update([
            'status' => $request->input('status'),
        ]);

        $totalPages = ceil(Post::count() / 5);
        for ($i = 1; $i <= $totalPages; $i++) {
            Cache::forget('admin_posts_page_' . $i);
        }
        Cache::forget("user_post_{$slug}");

        return redirect()->back()->with('success', 'Post updated successfully.');
    }
}
