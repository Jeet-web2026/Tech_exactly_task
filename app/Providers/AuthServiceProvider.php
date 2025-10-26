<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Post;
use App\Policies\CommentPolicy;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Comment::class => CommentPolicy::class,
        Post::class => PostPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
