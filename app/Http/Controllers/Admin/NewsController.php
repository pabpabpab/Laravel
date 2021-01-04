<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    public function index()
    {
        $perPage = 5;
        $list = (new News())->getAllByPage($perPage);
        return view('admin.index', [
            'list' => $list
        ]);
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
        $categories = (new NewsCategory())->getAll();
        return view('admin.create', [
            'categories' => $categories,
            'news' => new News()
        ]);
    }

    public function edit($id)
    {
        $categories = (new NewsCategory())->getAll();
        $oneNews = (new News())->getById($id);
        return view('admin.create', [
            'categories' => $categories,
            'news' => $oneNews
        ]);
    }

    public function save(Request $request)
    {
        $input = $request->all();
        if (isset($input['id'])) {
            $editResult = (new News())->saveOldOne($input);
            session(['editResult' => $editResult, 'editNewsId' => (int) $input['id']]);
        } else {
            $saveResult = (new News())->saveNewOne($input);
            session(['saveResult' => $saveResult]);
        }

        return redirect()->route('admin::news::index');
    }

    public function delete($id)
    {
        $deleteResult = (new News())->deleteOne($id);
        session(['deleteResult' => $deleteResult, 'deleteNewsId' => (int) $id]);
        return redirect()->route('admin::news::index');
    }
}
