@extends('layouts.layout')

@section('title')Index @endsection

@section('content')
        <div class="text-center">
            <a href="{{ route('posts.create') }}" class="mt-4 btn btn-success">Create Post</a>
        </div>


        <table class="table mt-4" id="datatable">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Description</th>
                <th scope="col">Created At</th>
                <th scope="col">Post Image</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach ( $posts as $post)
              <tr>
                <td>{{ $post->id}}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->creator }}</td>
                <td>{{ $post->description }}</td>
                <td>{{ $post->created_at }}</td>
                <td><img src="{{ asset('images/'.$post->image) }}" class="img-thumbnail" width="90" height="90" /></td>
                <td>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-primary">Edit</a>
                   <a class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This Post?')" href="{{route('posts.remove', $post->id)}}">Delete</a>

    </div>


    @endforeach



@endsection




