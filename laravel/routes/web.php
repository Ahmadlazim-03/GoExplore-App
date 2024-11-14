
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AuthLogin;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;

Route::view('/', 'landingpage/index');
Route::view('/login', 'form/login');
Route::view('/register', 'form/register');

Route::group([], function () {
    Route::GET('/logout', [LogoutController::class, 'logout']);
});

Route::group([], function () {
    Route::POST('/login', [LoginController::class, 'login']);
    Route::POST('/register', [RegisterController::class, 'register']);
});

Route::middleware(AuthLogin::class)->group(function (){
    Route::view('/dashboard-admin', 'admin/dashboard-admin');
    Route::view('/dashboard-pengunjung', 'pengguna/dashboard-pengguna');
    Route::view('/about', 'pengguna/about');
    Route::view('/destination', 'pengguna/destination');
    Route::view('/edit-profile', 'pengguna/edit-profile');
});