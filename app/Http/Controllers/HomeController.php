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
}
