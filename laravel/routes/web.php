
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AuthLogin;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DestinationController;

// Group Form
Route::group([], function () {
    Route::view('/login', 'form/login');
    Route::view('/register', 'form/register');
    Route::POST('/login', [LoginController::class, 'login']);
    Route::POST('/register', [RegisterController::class, 'register']);
    Route::GET('/logout', [LogoutController::class, 'logout']);
});


// Group Dashboard Pengguna
Route::group([], function () {
    Route::view('/', 'landingpage/home');
    Route::view('/destination', 'landingpage/destination');
    Route::view('/about', 'landingpage/about');
    Route::view('/contact', 'landingpage/contact');

});

// Group Dashboard Admin
Route::middleware(AuthLogin::class)->group(function (){
    Route::view('/dashboard-admin', 'admin/index');
    
    Route::get('/manajemenuser', [SettingController::class,'users']);
    Route::POST('/manajemen-user-create', [SettingController::class,'users_create']);
    Route::POST('/manajemen-user-edit', [SettingController::class,'users_edit']);
    Route::get('/manajemen-user-delete/{id}', [SettingController::class,'users_delete']);
    
    Route::get('/manajemenrole', [SettingController::class,'role']);
    Route::POST('/manajemen-role-create', [SettingController::class,'role_create']);
    Route::POST('/manajemen-role-edit', [SettingController::class,'role_edit']);
    Route::get('/manajemen-role-delete/{id}', [SettingController::class,'role_delete']);

    Route::get('/manajemenmenu', [SettingController::class,'menu']);
    Route::POST('/manajemen-menu-create', [SettingController::class,'menu_create']);
    Route::POST('/manajemen-menu-edit', [SettingController::class,'menu_edit']);
    Route::get('/manajemen-menu-delete/{id}', [SettingController::class,'menu_delete']);
    
    Route::get('/alldestination', [DestinationController::class,'all_destination']);
});

Route::get('/test', function(){
    return view('single');
});