<?php

namespace App\Strategies\LoginRedirect;

use Illuminate\Support\Facades\Auth;

class UserRedirectStrategy implements LoginRedirectStrategy
{
    public function redirect()
    {
        return redirect()->route('user.dashboard')
            ->with('success', 'Welcome ' . Auth::user()->fname . '!');
    }
}
