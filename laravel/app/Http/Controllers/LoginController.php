<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Auth::user()->update(['status' => 'active']);
            if (Auth::user()->role == 1) {
                return response()->json(['redirect' => '/dashboard']);
            }

            if (Auth::user()->role == 2) {
                return response()->json(['redirect' => '/mybookings']);
            }

            return response()->json(['redirect' => '/mybookings']);
        } else {
            return response()->json(['error' => 'Email atau password salah!'], 401);
        }

    }
}
