<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $categories = (new News())->getCategories();
        return view('news.index', ['categories' => $categories]);
    }

    public function newsCategory($topic)
    {
        $list = (new News())->getByCategory($topic);
        return view('news.category', ['topic' => $topic, 'list' => $list]);
    }

    public function newsCard($topic, $id)
    {
       $oneNews = (new News())->getById($id);
       return view('news.card', ['news' => $oneNews]);
    }

}
