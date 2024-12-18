<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class EditProfileController extends Controller
{
    public function index(){
        return view('setting/edit-profile');
    }
    public function edit(Request $request){

        $namaFile = Auth::user()->profile_picture; // Default to existing file
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $extension = $file->getClientOriginalExtension();
            $namaFile = Str::uuid() . '.' . $extension; // Generate a unique name
            $file->move(public_path('img'), $namaFile);
        }
    
        // Update user details
        $user = Auth::user();
        $user->name = $request->name ?? $user->name;
        $user->email = $request->email ?? $user->email;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->contact_info = $request->contact ?? $user->contact_info;
        $user->address = $request->address ?? $user->address;
        $user->date_of_birth = $request->date_of_birth ?? $user->date_of_birth;
        $user->profile_picture = $namaFile;
        $user->gender = $request->gender ?? $user->gender;
        $user->nationality = $request->nationality ?? $user->nationality;
        $user->updated_at = Carbon::now();
        $user->save();
        
        return redirect()->back();
    }
}
