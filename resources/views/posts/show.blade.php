@extends('layouts.layout')

@section('title')Show @endsection

@section('content')
        <form method="POST" action="{{ route('posts.show',$post->id)}}">

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1"  value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $post->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
                <select class="form-control">
                    <option selected value="1">{{ $post->creator }}</option>
                </select>
            </div>

        </form>
@endsection

