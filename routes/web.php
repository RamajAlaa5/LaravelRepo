<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
//<a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('city-delete', $result->my_id)}}"><i class="fa fa-trash"></i></a>

//Route::get('/test', function () {
//    return view('posts.testAlert');
//});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create/', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::get('/posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.remove');

Route::get('/comments/create/', [\App\Http\Controllers\CommentController::class, 'create'])->name('comment.create');
Route::post('/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
//Route::get('/comments/{comment}/edit', [\App\Http\Controllers\CommentController::class, 'edit'])->name('comments.edit');
//Route::put('/comments/{comment}', [\App\Http\Controllers\CommentController::class, 'update'])->name('comments.update');
//Route::get('/comments/{comment}/delete', [\App\Http\Controllers\CommentController::class, 'destroy'])->name('comments.remove');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

