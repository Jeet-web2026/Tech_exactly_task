<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $Posts = Cache::remember('all_latest_posts', now()->addMinutes(5), function () {
            return Post::with('user:id,fname,lname')
                ->latest()
                ->take(5)
                ->get(['user_id', 'id', 'title', 'content', 'category', 'image', 'created_at', 'slug']);
        });

        $singlePost = $Posts->first();
        $secondaryPost = $Posts->take(4);
        $techPosts = Cache::remember('all_latest_tech_news', now()->addMinutes(5), function () {
            return Post::with('user:id,fname,lname')
                ->where('category', 'Tech')
                ->latest()
                ->take(3)
                ->get(['user_id', 'id', 'title', 'content', 'category', 'image', 'created_at', 'slug']);
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
            return Post::where('id', $id)
                ->where('slug', $slug)
                ->firstOrFail();
        });
        return view('user.view-post', compact('post'));
    }
}
