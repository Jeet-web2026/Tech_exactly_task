<?php

namespace App\Strategies\LoginRedirect;

use Illuminate\Support\Facades\Auth;

class AdminRedirectStrategy implements LoginRedirectStrategy
{
    public function redirect()
    {
        return redirect()->route('admin.dashboard')
            ->with('success', 'Welcome ' . Auth::user()->fname . '!');
    }
}
