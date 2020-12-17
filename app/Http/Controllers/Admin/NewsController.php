<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class NewsController extends Controller
{

    public function __construct()
    {
        // Для админской части расшарить админское меню.
        // "Перебивает" $menu из метода boot().
        // Не знаю как по-другому для главной части сайта и админской расшарить каждой свое меню.
        $menu = (new Menu())->getAdminMenu();
        View::share('menu', $menu);
    }

    public function index()
    {
        return view('admin.index');
    }

    public function create()
    {
        return view('admin.create');
    }
}
