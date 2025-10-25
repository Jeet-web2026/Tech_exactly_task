<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;

class AuthController extends Controller
{
    public function signup()
    {
        return view('auth.signup');
    }

    public function signin()
    {
        return view('auth.signin');
    }

    public function register(RegistrationRequest $request)
    {
        // Registration logic here
    }
}
