<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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


Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/create/', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Route::delete('/posts/delete/{id}',[PostController::class,'destroy'])->name('posts.remove');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');


Route::get('/posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.remove');




Route::get('/comments/create/', [CommentController::class, 'create'])->name('comment.create');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/comments/{id}',[CommentController::class,'destroy'])->name('comments.remove');

Route::get('/comments/edit/{id}',[CommentController::class,'edit'])->name('comments.edit');
Route::put('/comments/update/{id}',[CommentController::class,'update'])->name('comments.update');
//Route::get('/comments/{comment}/delete', [\App\Http\Controllers\CommentController::class, 'destroy'])->name('comments.remove');


//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

