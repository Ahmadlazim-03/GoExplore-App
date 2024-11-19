
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AuthLogin;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SettingController;

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
    
    Route::get('/manajemen-user', [SettingController::class,'users']);
    Route::POST('/manajemen-user-create', [SettingController::class,'users_create']);
    Route::POST('/manajemen-user-edit', [SettingController::class,'users_edit']);
    Route::get('/manajemen-user-edit/{id}', [SettingController::class,'users_delete']);
    
    Route::get('/manajemen-role', [SettingController::class,'role']);
    Route::get('/manajemen-menu', [SettingController::class,'menu']);
   
});