<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register (Request $request){
        if($request){
            Log::info("masuk");
        } else {
            Log::info("Error");
        }
        
        $credentials = $request->validate([
            "name" => ['required'],
            "email" => ['required','email:dns'],
            "password" => ['required','min:5'],
            "gender" => ['required']
        ]);
        $create = User::create($credentials);

        if($create){
            return response()->json(['redirect' => '/dashboard-pengunjung']);
        }
        return response()->json(['error' => 'Invalid credentials'], 401);
    }
}