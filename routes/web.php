<?php

 use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\HomeController;
 use App\Http\Controllers\PostController;
 use App\Http\Controllers\CommentController;

//
// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | contains the "web" middleware group. Now create something great!
// |
// */
//
// Route::get('/', function () {
//     return view('welcome');
// });
//
// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');
//
// Route::get('/post/create', 'PostController@create')->name('post.create');
// Route::post('/post/store', 'PostController@store')->name('post.store');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('/post/create', [PostController::class,'create'])->name('post.create');
Route::post('/post/store', [PostController::class,'store'])->name('post.store');
Route::get('/posts', [PostController::class,'index'])->name('posts');
Route::get('/post/show/{id}', [PostController::class,'show'])->name('post.show');
Route::post('/comment/store',[CommentController::class,'store'])->name('comment.add');
Route::post('/reply/store', [CommentController::class,'replyStore'])->name('reply.add');
Route::get('/post/edit/{id}',[PostController::class,'edit'])->name('post.edit');
Route::post('/post/update/{id}',[PostController::class,'update'])->name('post.update');
Route::get('/post/delete/{id}',[PostController::class,'delete'])->middleware(['admin'])->name('post.delete');
