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
    public function boot(Request $request)
    {
        $request = request();
        // $uri = $request->path();
        if ($request->is('admin/*')) {
            $menu = (new Menu())->getAdminMenu();
        } else {
            $menu = (new Menu())->getMainMenu();
        }

        View::share('menu', $menu);
    }
}
