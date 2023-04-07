<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Livewire\BlogList;
use App\Http\Livewire\SearchPosts;
use App\Http\Livewire\Comments;
use App\Mail\CommentNotification;

use Illuminate\Support\Facades\Auth;

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


Route::middleware(['auth'])->group(function () {

  Route::get('/', function () {
    return view('/home');
  });

  Route::get('/updateBlog', function () {
    return view('/updateBlog');
  });

  Route::get('/profile', function () {
    return view('/profile');
  });

  Route::get('/home', [HomeController::class, 'create'])->name('');
  Route::get('/search-posts', SearchPosts::class, 'search')->name('search');
  Route::get('/comments', Comments::class)->name('comments');
  Route::get('/blog-list', BlogList::class)->name('');

  Route::get('login/{provider}', 'Auth\SocialController@redirectToProvider')->name('social.login');
  Route::get('login/{provider}/callback', 'Auth\SocialController@handleProviderCallback')->name('social.callback');


  //Blog Controller class routeerm
  Route::get('/post', [PostsController::class, 'index'])->name('posts');
  Route::get('/show', [PostsController::class, 'show'])->name('post.show');
  Route::get('/create', [PostsController::class, 'create'])->name('posts.create');
  Route::post('/create', [PostsController::class, 'store'])->name('posts.store');
  Route::get('/edit/{id}', [PostsController::class, 'edit'])->name('posts.edit');
  Route::post('/edit/{id}', [PostsController::class, 'update'])->name('posts.update');
  Route::get('/post-delete/{id}', [PostsController::class, 'destroy'])->name('posts.delete');


  Route::get('/comments', [CommentController::class, 'index'])->name('comments');
  Route::post('/post/{post_id}/comment', [CommentController::class, 'store'])->name('comments.store');



  //Comments Controller class route
  Route::get('/category', [CategoryController::class, 'index'])->name('categories');
  Route::get('/newCategory', [CategoryController::class, 'create'])->name('category.create');
  Route::post('/newCategory', [CategoryController::class, 'store'])->name('category.store');
  Route::get('/updateCategory/{id}', [CategoryController::class, 'edit'])->name('category.edit');
  Route::post('/updateCategory/{id}', [CategoryController::class, 'update'])->name('category.update');
  Route::get('/category-delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');
});

Route::get('storage/{type}/{filename}', function ($type, $filename) {
  // Add folder path here instead of storing in the database.
  $path = storage_path('app/' . $type . '/' . $filename);
  // return $path;
  if (!File::exists($path)) {
    abort(404);
  }

  $file = File::get($path);
  $type = File::mimeType($path);

  $response = Response::make($file, 200);
  $response->header("Content-Type", $type);

  return $response;
});

Auth::routes();
