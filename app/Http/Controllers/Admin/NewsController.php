<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAuthorizationRequest;
use App\Http\Requests\AdminNewsSaveRequest;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    public function index()
    {
        $list = (new News())->getAll()
            ->paginate(5);
        return view('admin.index', [
            'list' => $list
        ]);
    }

    public function auth()
    {
        return view('admin.auth');
    }

    public function login(AdminAuthorizationRequest $request)
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

    public function save(AdminNewsSaveRequest $request)
    {
        $input = $request->all();
        $saveResult = (new News())->saveOne($input);
        return redirect()->route('admin::news::index')
            ->with('saveResult', $saveResult);
    }

    public function delete($id)
    {
        $deleteResult = (new News())->deleteOne($id);
        return redirect()->route('admin::news::index')
            ->with('deleteResult', $deleteResult);
    }
}
