
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('/home/index');
});

Route::get('/dashboard-menu-admin', function () {
    return view('/admin/dashboard');
});


