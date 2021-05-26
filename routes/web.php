<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
// use App\Http\Controllers\PostsController@store;
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

Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/services', [PagesController::class, 'services']);
// Route::get('/create', [PagesController::class, 'create']);
// Route::post('/create', [PagesController::class, 'create']);
Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/posts', 'PostsController@index')->name('posts');

Route::post('/comment/store', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.add');

Route::resources([
    'posts' => PostsController::class,
]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


//comment routs
Route::get('/post/create', 'PostsController@create')->name('post.create');
Route::post('/post/store', 'PostsController@store')->name('post.store');

// Category route
// Route::resource('category', 'CategoryController');