<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/test',function(){
return "this is a test";
});
Route::get("/posts",[PostController::class,'index'])->middleware('auth:sanctum');
Route::post("/posts",[PostController::class,'store']);
Route::get("/posts/{post}",[PostController::class,'show']);

// Route::post('sanctum/token',function(Request $request){
//  $request->validate([
//       'email'=>'required|email',
//       'password'=>'required',
//       'device_name'=>'required'
//  ]);
// });

// $user = User::where('email',$request->email)->first();

