<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $this->headerRender();
        echo"<h1>Authorization</h1>";
        echo "
        <form action='/admin/news/login' method='post'>
        Login<br>
        <input type='email' name='login'><br>
        Password<br>
        <input type='password' name='password'><br>
        <input type='submit' name='submit'>
        </form>
        ";
        exit;
    }

    public function create()
    {
        $this->headerRender();
        echo"<h1>Create news</h1>";
        echo "
        <form action='/admin/news/add' method='post'>
        Title<br>
        <input type='text' name='title'><br>
        About<br>
        <input type='text' name='about'><br>
        Text<br>
        <textarea name='text'></textarea><br>
        <input type='submit' name='submit'>
        </form>
        ";
        exit;
    }

    protected function headerRender()
    {
        echo "
        <div style='text-align:right;padding: 20px 0 0 0;margin-bottom:-30px;'>
        <a href='/admin/news' style='margin-left:50px;'>Authorization</a>
        <a href='/admin/news/create' style='margin-left:50px;'>Create News</a>
        <a href='/' style='margin-left:50px;'>Main page</a>
        </div>";
    }
}
