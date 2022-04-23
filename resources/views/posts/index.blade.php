{{--  @extends('layouts.layout')  --}}
@extends('layouts.app')
@section('title')Index @endsection

@section('content')
        <div class="text-center">
            <a href="{{ route('posts.create') }}" class="mt-4 btn btn-success">Create Post</a>
        </div>



        <table class="table mt-4" id="datatable" style="border: 5px;">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
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
                <td>{{ $post->id}}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->description }}</td>
                <td>{{ $post->created_at }}</td>
                <td><img src="{{ asset('images/'.$post->image) }}" class="img-thumbnail" width="90" height="90" /></td>
                <td>

                    <a href="{{ route('posts.show', $post->id) }}" style="color: white" class="btn btn-primary">View</a>
                    <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-success">Edit</a>
                    <form  method="POST" action="{{route('posts.destroy',['post'=>$post->id])}}">
                        @csrf
                        @method('delete')

                   {{--  <a class="btn btn-danger" onclick="return confirm('Are You Sure You Want To Delete This Post?')" href="{{route('posts.destroy', $post->id)}}">Delete</a>  --}}
                   <button class="btn btn-danger" style="margin-left: 116px;margin-top:-63px;" title="Delete" type="submit" onclick="return confirm('Are You Sure You Want To Delete This Post?')">Delete</button>


                </form>
                </td>

              </tr>
    @endforeach
</tbody>
</table>

@endsection

@section('content2')
<h3>Pagination</h3>
{{ $posts->links() }}
@endsection



