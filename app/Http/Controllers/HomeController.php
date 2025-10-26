<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $Posts = Cache::remember('all_latest_posts', now()->addMinutes(5), function () {
            return Post::with('user')
                ->where('status', 'active')
                ->latest()
                ->take(5)
                ->get();
        });

        $singlePost = $Posts->first();
        $secondaryPost = $Posts->take(4);
        $techPosts = Cache::remember('all_latest_tech_news', now()->addMinutes(5), function () {
            return Post::with('user')
                ->where('category', 'Tech')
                ->where('status', 'active')
                ->latest()
                ->take(3)
                ->get();
        });

        $secondaryTechPost = $techPosts->first();

        return view('index', compact(
            'Posts',
            'singlePost',
            'secondaryPost',
            'techPosts',
            'secondaryTechPost'
        ));
    }

    public function ManagePost(string $slug, int $id): View
    {
        $cacheKey = "post_{$id}_{$slug}";

        $post = Cache::remember($cacheKey, now()->addMinutes(10), function () use ($id, $slug) {
            return Post::with('user')->where('id', $id)
                ->whereHas('user')
                ->where('slug', $slug)
                ->firstOrFail();
        });
        return view('user.view-post', compact('post'));
    }

    public function ManageComment(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'comment' => 'required'
        ]);

        $comments = Comment::updateOrCreate([
            'post_id' => $id
        ], [
            'comment_body' => $request->comment,
            'user_id' => Auth::id()
        ]);

        if (empty($comments)) {
            return back()->with('error', 'Something went wrong!');
        }
        return back()->with('success', 'Comment added successfully!');
    }
}
