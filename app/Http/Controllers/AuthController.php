<?php

namespace App\Http\Controllers;

use App\Factories\LoginRedirectFactory;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'password' => $request->password
        ]);

        if ($user) {
            return redirect()->route('signin')->with('success', 'User registered successfully!');
        }

        return redirect()->back()->with('error', 'Registration failed. Please try again.');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $redirector = LoginRedirectFactory::make($user->type);

            return $redirector->redirect();
        }
        return redirect()->back()->with('error', 'Invalid credentials!');
    }
}
