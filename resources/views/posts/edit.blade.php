@extends('layouts.layout')

@section('title')Edit @endsection

@section('content')
        <form method="POST" action="{{ route('posts.update',$post->id)}}"  enctype="multipart/form-data">
@csrf
@method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{ $post->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
                <select class="form-control" name="creator">
                    @foreach ($users as $user)
                    <option selected="selected" value="{{ $user->id}}">{{ $user->name }}</option>
                 @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <div class="col-md-8 form-control">
                 <img id="original" src="{{ asset('/images/'.$post->image) }}" height="70" width="70">
                 <input type="file" name="image" value="{{ $post->image }}" />
                </div>
               </div>


          <button class="btn btn-success">Edit</button>
        </form>
@endsection

