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
Route::get('/',function(){
return view("welcome");
});

Route::group([ 'middleware' => 'auth'],function(){
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create/', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});




Route::group(['middleware'=>'auth'],function(){
    Route::get('/comments/create/', [CommentController::class, 'create'])->name('comment.create');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/comments/edit/{id}',[CommentController::class,'edit'])->name('comments.edit');
    Route::put('/comments/update/{id}',[CommentController::class,'update'])->name('comments.update');
    Route::delete('/comments/{post}', [CommentController::class, 'destroy'])->name('comments.remove');

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

