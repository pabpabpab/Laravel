<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['routeName' => 'hello']);
});

Route::get('/about', function () {
    return view('about', ['routeName' => 'about']);
});

Route::get('/news', function () {
    return view('news', ['routeName' => 'news']);
});
