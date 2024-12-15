
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AuthLogin;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\DetailDestinationController;
use App\Http\Controllers\SinglePageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MyBookingsController;
use App\Http\Controllers\AcceptPaidController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CancelBookingsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddListController;
use App\Http\Controllers\ListBookingsController;


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
    Route::get('/', [HomeController::class,'index']);
    Route::get('/destination', [DestinationController::class,'index']);
    Route::get('/destination/single-page/{id}', [SinglePageController::class,'index']);
    Route::POST('/tambah-comment/{id}',[SinglePageController::class,'tambah_comment']);
    Route::view('/about', 'landingpage/about');
    Route::view('/contact', 'landingpage/contact');
    Route::view('/test', 'landingpage/test');
    Route::view('/blog/8-best-homestay-surabaya', 'blog.single');
    Route::view('/read-more', 'landingpage.read-more')->name('read-more');
});

// Group Dashboard Admin
Route::middleware(AuthLogin::class)->group(function (){
    Route::view('/dashboard', 'admin/dashboard');
    
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
    Route::POST('/create-destination', [DestinationController::class,'create_destination']);
    Route::POST('/edit-destination', [DestinationController::class,'edit_destination']);
    Route::get('/delete-destination/{id}', [DestinationController::class,'delete_destination']);

    Route::get('/detaildestination', [DetailDestinationController::class,'detail_destination']);
    Route::POST('/create-detail-destination', [DetailDestinationController::class,'create_detail_destination']);
    Route::POST('/edit-detail-destination', [DetailDestinationController::class,'edit_detail_destination']);
    Route::get('/delete-detail-destination/{id}', [DetailDestinationController::class,'delete_detail_destination']);

    Route::get('/mybookings', [MyBookingsController::class,'index']);
    Route::get('/listbookings',[ListBookingsController::class,'index']);
    Route::get('/cancelbookings',[CancelBookingsController::class,'show_cancel_bookings']);
});

Route::POST('/cancelbookings',[CancelBookingsController::class,'cancel_bookings']);
Route::get('/ticket/{id}',[TicketController::class,'show_ticket']);


Route::POST('/checkout',[OrderController::class,'checkout']);
Route::POST('/success-paid',[AcceptPaidController::class,'change_status']);
Route::POST('/add-list',[AddListController::class,'index']);

