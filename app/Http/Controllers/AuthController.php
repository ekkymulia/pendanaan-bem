<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginBsTtValidation()
    {
        return view('authentication.login-bs-tt-validation');
    }

    public function authenticateBsTtValidation(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user(); 
            return redirect()->route('dashboard.index', ['user' => $user]);
        }

        return redirect()->route('login')->withErrors(['email' => 'Invalid email or password']);

    }
}
