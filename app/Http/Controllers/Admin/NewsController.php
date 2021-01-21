<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAuthorizationRequest;
use App\Http\Requests\AdminNewsSaveRequest;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;


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

    public function create()
    {
        return view('admin.create', [
            'categories' => (new NewsCategory())->getAll(),
            'news' => new News()
        ]);
    }

    public function edit($id)
    {
        return view('admin.create', [
            'categories' => (new NewsCategory())->getAll(),
            'news' => (new News())->getById($id)
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
