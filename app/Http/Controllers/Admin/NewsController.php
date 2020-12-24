<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class NewsController extends Controller
{
    public function index()
    {
        // dd(session()->all());
        return view('admin.index');
    }

    public function auth()
    {
        return view('admin.auth');
    }

    public function login(Request $request)
    {
        // flash the current input to the session
        $request->flashOnly(['login']);
        // Store a piece of data in the session...
        session(['login' => $request->input('login')]);
        // redirect
        return redirect()->route('admin::news::index');
    }

    public function create()
    {
        return view('admin.create');
    }

    public function add(Request $request)
    {
        $request->flashOnly(['title', 'about', 'text']);
        return redirect()->route('admin::news::create');
    }
}
