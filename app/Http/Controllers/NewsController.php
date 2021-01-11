<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;


class NewsController extends Controller
{
    public function index()
    {
        $categories = (new NewsCategory())->getAll();
        return view('news.index', ['categories' => $categories]);
    }

    public function newsCategory($categoryId, $topic)
    {
        $list = (new NewsCategory())->getNewsByCategoryId($categoryId);
        return view('news.category', [
            'categoryId' => $categoryId,
            'topic' => $topic,
            'list' => $list
        ]);
    }

    public function newsCard($categoryId, $topic, $id)
    {
       $oneNews = (new News())->getById($id);
       $category = $oneNews->category;
       return view('news.card', [
           'category' => $category,
           'news' => $oneNews
       ]);
    }

}
