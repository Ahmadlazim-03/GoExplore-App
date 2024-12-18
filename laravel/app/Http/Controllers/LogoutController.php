<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request){
        if (Auth::check()) {
            Auth::user()->update(['status' => 'inactive']);
        }
    
        Auth::logout();
    

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    

        return redirect('/');
    }
}
