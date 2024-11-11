
<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin/dashboard');
});

Route::get('/login', function () {
    return view('form/login');
}); 

Route::get('/register', function () {
    return view('form/register');
});