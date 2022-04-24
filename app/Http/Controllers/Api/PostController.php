<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index(){
         $posts =Post::all();
         return $posts;
        // return 'we are in inex';
    }


    public function show($id){
        $post =Post::findOrFail($id);
        return $post;
   }


   public function store(StorePostRequest $request){


    $imageName = time().'.'.request()->image->getClientOriginalExtension();
    request()->image->move(public_path('/images'), $imageName);
    $post = new Post();
    $post->user_id=request('creator');
    $post->creator=User::select("name")->where("id","=",$post->user_id)->get();
    $post->title=request(("title"));
    $post->description=request(("description"));
    $post->image=$imageName;
    $post->save();
    return $post;
}
}
