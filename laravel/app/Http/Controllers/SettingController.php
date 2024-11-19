<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class SettingController extends Controller
{
    public function users(){
        return view('admin/setting/manajemen-user',[
            "DataUser" => User::all()
        ]);
    }

    public function users_create(Request $request){
        $nm = $request->profile_picture;
        $namaFile = $nm->getclientOriginalName();
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->contact_info = $request->contact_info;
        $user->profile_picture = $namaFile;
        $nm->move(public_path().'/img',$namaFile);
        $user->full_name = $request->full_name;
        $user->address = $request->address;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->nationality = $request->nationality;
        $user->role = $request->role;
        $user->status = "inactive";
        $user->save();
        return redirect('/manajemen-user');
    }

    public function users_edit(Request $request){
        $user = User::findOrFail($request->ID);
        if ($user){
            $nm = $request->profile_picture;
            if ($nm) {
    
                $namaFile = $nm->getClientOriginalName();
                $nm->move(public_path('/img'), $namaFile);
                $user->profile_picture = $namaFile; 
            }
    
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->password) {
                $user->password = Hash::make($request->password); 
            }
            $user->contact_info = $request->contact_info;
            $user->full_name = $request->full_name;
            $user->address = $request->address;
            $user->date_of_birth = $request->date_of_birth;
            $user->gender = $request->gender;
            $user->nationality = $request->nationality;
            $user->role = $request->role;
            $user->save(); 
            return view('admin/setting/manajemen-user');
           
        } else {
            return "<script>alert('ID Tidak Ditemukan')</script>";
        }
          
    }

    public function users_delete($id){
        $user = User::findOrFail(id: $id);
        $user->delete();
        return redirect('/manajemen-user');
    }

    public function role(){
        return view('admin/setting/manajemen-role');
    }

    public function menu(){
        return view('admin/setting/manajemen-menu');
    }
}
