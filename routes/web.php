<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\LoginController;
use App\User;

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
    Route::put('/posts/update/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::put('/posts/restore/{id}',[PostController::class,'restore'])->name('post.restore');

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


use Laravel\Socialite\Facades\Socialite;

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('github.auth');

// Route::get('/auth/callback', function () {
//     $user = Socialite::driver('github')->stateless()->user();
//  dd($user);
//     //$user->token;
// });


Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->stateless()->user();

    $user = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);

    Auth::login($user);
    return redirect()->route('posts.index');
    // $user->token
});




Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('google.auth');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

