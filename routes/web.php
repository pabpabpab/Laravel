<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\LocaleController;
use \App\Http\Controllers\SocialController;

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


// Админка новостей админом
Route::group([
    'prefix' => '/admin/news',
    'as' => 'admin::news::',
    'namespace' => '\App\Http\Controllers\Admin',
    // 'middleware' => ['auth', 'role:admin'], // мой прежний middleware
], function () {
    Route::get('/', 'NewsController@index')
        ->name('index')
        // (кажется эти middleware работают до Gate::before в AuthServiceProvider)
        ->middleware('role:admin|super-admin'); // spatie
    Route::get('/create', 'NewsController@create')
        ->name('create')
        ->middleware('permission:create news'); // spatie
    Route::get('/{id}-edit', 'NewsController@edit')
        ->name('edit')
        ->middleware('permission:edit news'); // spatie
    Route::post('/save', 'NewsController@save')
        ->name('save')
        ->middleware('permission:create news|edit news'); // spatie
    Route::get('/{id}-delete', 'NewsController@delete')
        ->name('delete')
        ->middleware('permission:delete news'); // spatie
});


// Профайл
Route::group([
    'prefix' => '/admin/users',
    'as' => 'admin::users::',
    'namespace' => '\App\Http\Controllers\Admin',
], function () {
    Route::get('/myprofile', 'ProfileController@myProfile')
        ->name('myprofile')
        ->middleware('auth');
    Route::post('/save', 'ProfileController@save')
        ->name('save')
        ->middleware(['auth', 'checkCurrentPassword', 'uniqueEmail']);
});


// Аутентификация
Route::group([
    'namespace' => '\App\Http\Controllers\Auth'
], function () {

    Route::get('/register', 'RegisterController@index')
        ->name('register')
        ->middleware('guest');
    Route::post('/register', 'RegisterController@create')
        ->name('register::create')
        ->middleware('guest');

    Route::get('/login', 'LoginController@index')
        ->name('login')
        ->middleware('guest');
    Route::post('/authenticate', 'LoginController@authenticate')
        ->name('authenticate')
        ->middleware(['guest', 'makeLogin']);

    Route::get('/logout', 'LoginController@logout')
        ->name('logout')
        ->middleware('auth');
});


// Аутентификация через соцсети
Route::group([
    'prefix' => 'social',
    'as' => 'social::',
], function () {
    Route::get('/login/{socialNetwork}', [SocialController::class, 'login'])
        ->name('login')
        ->middleware('guest')
        ->where('socialNetwork', '(vkontakte|yandex)');
    Route::get('/{socialNetwork}/response', [SocialController::class, 'response'])
        ->name('response')
        ->where('socialNetwork', '(vkontakte|yandex)');
});




// Сменить локаль
Route::get('/locale/{locale}', [LocaleController::class, 'setLocale'])
    ->name('locale::set')
    ->where('locale', __('locale.langRegExp'));
// regexp из файла, где также список языков, чтоб было в одном месте



// Xml-парсер
Route::group([
    'prefix' => '/admin/parser',
    'as' => 'admin::parser::',
    'namespace' => '\App\Http\Controllers\Admin',
    // 'middleware' => ['auth', 'role:admin'], // мой прежний middleware
], function () {
    Route::get('/', 'XmlParserController@index')
        ->name('index')
        ->middleware('permission:load xml news'); // spatie
});









