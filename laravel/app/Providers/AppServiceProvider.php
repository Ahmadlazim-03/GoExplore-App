<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Role;
use App\Models\Menu;
use App\Models\SettingMenu;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        
    }
    public function boot(): void
    {
        View::share('DataUser', User::all());
        View::share('DataRole', Role::all());
        View::share('DataMenu', Menu::all());
        View::share('DataSettingMenu', SettingMenu::all());
    }
}
