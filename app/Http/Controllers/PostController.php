<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Carbon;
use DB;
use App\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::paginate(3);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $posts=Post::all();
       $users=User::all();
        return view("posts.create",compact("posts",'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('/images'), $imageName);
        $post = new Post();
        $post->user_id=request('creator');
        $post->creator=User::select("name")->where("id","=",$post->user_id)->get();
        $post->title=request(("title"));
        $post->description=request(("description"));
        $post->image=$imageName;
        $post->save();
        return redirect(route('posts.index'))->with('success','Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =Post::findOrFail($id);
        $users=User::all();
        return view("posts.show",compact(['post','users']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post =Post::findOrFail($id);
        $users =User::all();

        return view("posts.edit",compact(["post","users"]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $post =Post::findOrFail($id);
        $post->user_id=request('creator');
        $post->creator=User::select("name")->where("id","=",$post->user_id)->get();
        $post->title=request(("title"));
        $post->description=request(("description"));
        if($files=request()->file('image'))
        {
         $imageName = time().'.'.request()->image->getClientOriginalExtension();
         request()->image->move(public_path('/images'), $imageName);
         $post->image=$imageName;
        }
        $post->save();
        return redirect(route('posts.index'))->with('success','Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =Post::find($id);
        $post->delete();
        return redirect(route('posts.index'))->with('success','Deleted Successfully');
    }
}
