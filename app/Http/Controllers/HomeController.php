<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $Posts = Cache::remember('all_latest_posts', now()->addMinutes(5), function () {
            return Post::with('user:id,fname,lname')
                ->latest()
                ->take(5)
                ->get(['user_id', 'id', 'title', 'content', 'category', 'image', 'created_at']);
        });

        $singlePost = $Posts->first();
        $secondaryPost = $Posts->take(4);
        $techPosts = Cache::remember('all_latest_tech_news', now()->addMinutes(5), function () {
            return Post::with('user:id,fname,lname')
                ->where('category', 'Tech')
                ->latest()
                ->take(3)
                ->get(['user_id', 'id', 'title', 'content', 'category', 'image', 'created_at']);
        });

        return view('index', compact(
            'Posts',
            'singlePost',
            'secondaryPost',
            'techPosts'
        ));
    }
}
