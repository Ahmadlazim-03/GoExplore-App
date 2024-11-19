<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        
    }
    public function boot(): void
    {
        View::share('DataUser', User::all());
    }
}
