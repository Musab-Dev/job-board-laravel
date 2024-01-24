<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('/');
        } else {
            return redirect()->back()->with('error', 'user credentials are incorrect.');
        }
    }

    public function logout()
    {
        Auth::logout();
        // FOR MORE SECURITY:
        // remove all user-related date from the session
        request()->session()->invalidate();
        // regenerate the csrf tokens to prevent preloaded (before logging out)
        // forms from being sent to the server
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function register()
    {
        return view('auth.register');
    }
}
