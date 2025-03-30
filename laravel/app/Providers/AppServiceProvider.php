<?php

namespace App\Providers;

use App\Models\Destination;
use App\Models\DetailDestination;
use App\Models\Menu;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        View::share('DataUser', User::all());
        View::share('DataRole', Role::all());
        View::share('DataMenu', Menu::all());

        View::share('DataDestination', Destination::all());
        View::share('DataDetailDestination', DetailDestination::all());

    }
}
