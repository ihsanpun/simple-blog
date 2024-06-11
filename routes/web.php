<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostsController;
use App\Models\Category;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('home', [
        "title" => "home",
        "active" => "home"
    ]);
});
Route::get('/about', function () {
    return view('about', [
        "title" => "about me",
        "active" => "about me",
        "name" => "ihsan",
        "hobi" => "coding",
        "asal" => "bekasi"
    ]);
})->middleware('auth');
Route::get('/blog', [PostController::class, 'index']);

//halaman single post

Route::get('blog/{post:slug}', [PostController::class, 'show']);


Route::get('/categories', function () {
    return view('categories', [
        "categories" => Category::all(),
        "active" => 'categories',
        "title" => 'categories'
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('/dashboard/posts', DashboardPostsController::class)->middleware('auth');

Route::get('/dashboard/post/createSlug', [DashboardPostsController::class, 'createSlug'])->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');
