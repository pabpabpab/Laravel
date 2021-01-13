<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|Route::get('/', function () {return view('welcome');});
Route::get('/hello', function () {return view('hello', ['routeName' => 'hello']);});
*/


Route::get('/', [NewsController::class, 'index'])
    ->name('news::categories');

Route::get('/news/{categoryId}-{topic}', [NewsController::class, 'newsCategory'])
    ->name('news::category')
    ->where('categoryId', '[0-9]+')
    ->where('topic', '[a-z]+');

Route::get('/news/{categoryId}-{topic}/{id}-{title}', [NewsController::class, 'newsCard'])
    ->name('news::card')
    ->where('categoryId', '[0-9]+')
    ->where('topic', '[a-z]+')
    ->where('id', '[0-9]+');



Route::group([
    'prefix' => '/admin/news',
    'as' => 'admin::news::',
    'namespace' => '\App\Http\Controllers\Admin'
], function () {
    Route::get('/', 'NewsController@index')
        ->name('index');
    Route::get('/auth', 'NewsController@auth')
        ->name('auth');
    Route::post('/login', 'NewsController@login')
        ->name('login');
    Route::get('/create', 'NewsController@create')
        ->name('create');
    Route::get('/{id}-edit', 'NewsController@edit')
        ->name('edit');
    Route::post('/save', 'NewsController@save')
        ->name('save');
    Route::get('/{id}-delete', 'NewsController@delete')
        ->name('delete');
});
