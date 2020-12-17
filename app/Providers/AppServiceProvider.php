<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        // Не работает в этом методе Illuminate\Support\Facades\Route::currentRouteName();
        $currentRouteName = Route::currentRouteName();
        $mas = explode("::", $currentRouteName);
        if ($mas[0] == 'admin') {
            $menu = (new Menu())->getAdminMenu();
        } else {
            $menu = (new Menu())->getMainMenu();
        }
        */

        $menu = (new Menu())->getMainMenu();
        View::share('menu', $menu);
    }
}
