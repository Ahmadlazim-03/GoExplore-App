<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Role;
use App\Models\User;
use App\Models\SettingMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        return redirect('/manajemenuser');
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
            return redirect('/manajemenuser');
           
        } else {
            return "<script>alert('ID Tidak Ditemukan')</script>";
        }
          
    }

    public function users_delete($id){
        $user = User::findOrFail(id: $id);
        $user->delete();
        return redirect('/manajemenuser');
    }


    
    public function role(){
        return view('admin/setting/manajemen-role',[
            "DataRole" => Role::all()
        ]);
    }

    public function role_create(Request $request){
        $role = new Role();
        $role->name = $request->role;
        $role->save();
        return redirect('/manajemenrole');
    }

    public function role_edit(Request $request){
        $role = Role::findOrFail($request->ID);
        if ($role){
            $role->name = $request->role;
            $role->save(); 
            return redirect('/manajemenrole');
           
        } else {
            return redirect('/manajemenrole');
        }
          
    }

    public function role_delete($id){
        $user = Role::findOrFail($id);
        $user->delete();
        return redirect('/manajemenrole');
    }


    public function menu(){
        return view('admin/setting/manajemen-menu',[
            "DataMenu" => Menu::all()
        ]);
    }

    public function menu_create(Request $request){
        $menu = new Menu();
        $menu->tipe_menu = $request->tipe_menu;
        $menu->name = $request->name;
        $menu->icon_menu = $request->icon_menu;
        $menu->href = $request->href;
        $menu->id_parent = $request->id_parent;
        $menu->save();
        return redirect('/manajemenmenu');
    }

    public function menu_edit(Request $request){
        $menu = Menu::findOrFail($request->ID);
        if ($menu){
            $menu->tipe_menu = $request->tipe_menu;
            $menu->name = $request->name;
            $menu->icon_menu = $request->icon_menu;
            $menu->href = $request->href;
            $menu->id_parent = $request->id_parent;
            $menu->save();
            return redirect('/manajemenmenu');
           
        } else {
            return redirect('/manajemenmenu');
        }
          
    }

    public function menu_delete($id){
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect('/manajemenmenu');
    }
}
