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


    /*
     protected function headerRender()
    {
        echo "
        <div style='text-align:right;padding: 20px 0 0 0;margin-bottom:-30px;'>
        <a href='/' style='margin-left:50px;'>Main page</a>
        <a href='/admin/news' style='margin-left:50px;'>Admin</a>
        </div>
        ";
    }
*/
}
