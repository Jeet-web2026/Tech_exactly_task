<?php

namespace App\Factories;

use App\Strategies\LoginRedirect\AdminRedirectStrategy;
use App\Strategies\LoginRedirect\LoginRedirectStrategy;
use App\Strategies\LoginRedirect\UserRedirectStrategy;

class LoginRedirectFactory
{
    public static function make(string $type): LoginRedirectStrategy
    {
        return match ($type) {
            'admin' => new AdminRedirectStrategy(),
            default => new UserRedirectStrategy(),
        };
    }
}
