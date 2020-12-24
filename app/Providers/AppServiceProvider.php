<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use Illuminate\Http\Request;


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
    public function boot(Request $request, Menu $menu)
    {
        if ($request->is('admin/*')) {
            $menuSet = $menu->getAdminMenu();
        } else {
            $menuSet = $menu->getMainMenu();
        }

        View::share('menu', $menuSet);
    }
}
