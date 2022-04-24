<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Carbon;
use DB;
use App\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
    public function store(StorePostRequest $request)
    {


        $post = new Post();
        $file = $request->file('image');
        $imageName = $file->getClientOriginalName();
        $path = Storage::putFileAs('public/images', $request->file('image'), $imageName);
        $post->user_id=request('creator');
        $post->creator=User::select("name")->where("id","=",$post->user_id)->get();
        $post->title=request(("title"));
        $post->description=request(("description"));
        $post->slug=Str::slug($request->input('title'));
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
    public function update(UpdatePostRequest $request,$id)
    {


        $post =Post::findOrFail($id);
        $post->user_id=request('creator');
        $post->creator=User::select("name")->where("id","=",$post->user_id)->get();
        $post->title=request(("title"));
        $post->description=request(("description"));

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $imageName = $file->getClientOriginalName();
            $path = Storage::putFileAs('public/images', $request->file('image'), $imageName);
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
        $post =Post::findOrFail($id);
        $post->delete();
        Storage::delete('images/'.$post->image);
        return redirect(route('posts.index'))->with('success','Deleted Successfully');
    }

    // public function restore($id){
    //     $post =Post::withTrashed($id)->where('id', $id)->first();
    //     $post->restore();
    //     $post->save();

    //     return redirect(route('posts.index'))->with('success','Restored Successfully');

    // }
}
