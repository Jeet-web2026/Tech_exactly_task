<?php

namespace App\Http\Controllers;

use App\Factories\LoginRedirectFactory;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function signup(): View
    {
        return view('auth.signup');
    }

    public function signin(): View
    {
        return view('auth.signin');
    }

    public function register(RegistrationRequest $request): RedirectResponse
    {
        $user = User::create([
            'fname' => $request->firstname,
            'lname' => $request->lastname,
            'email' => $request->email,
            'password' => $request->password,
            'status' => 'active',
            'permissions' => ['post' => 1, 'comment' => 1],
        ]);

        if ($user) {
            return redirect()->route('signin')->with('success', 'User registered successfully!');
        }

        return redirect()->back()->with('error', 'Registration failed. Please try again.');
    }

    public function login(Request $request): RedirectResponse|View
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->user_type == 'admin') {
                $redirector = LoginRedirectFactory::make($user->user_type);
                return $redirector->redirect();
            }
            return redirect()->route('home');
        }
        return redirect()->back()->with('error', 'Invalid credentials!');
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        Cache::flush();

        return back()->with('success', 'Logged out successfully!');
    }
}
