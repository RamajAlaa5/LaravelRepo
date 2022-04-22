@extends('layouts.layout')

@section('title')Show @endsection

@section('content')


<div class="card my-3">
    <h5 class="card-header">Post Info</h5>
    <div class="card-body">
        <h5 class="form-label">Title: {{ $post->title }}</h5>
        <h5 class="form-label">Description:{{ $post->description }} </h5>
<!--        <p class="card-text">/p>-->
    </div>
</div>

<div class="card my-3">
    <h5 class="card-header">Post Creator Info</h5>
    <div class="card-body">
        <h5 class="card-title">Name: {{ $post->user->name }}</h5>
        <h5 class="card-title">Email: {{ $post->user->email }}</h5>
        <h5 class="card-title">Created At: {{ \Carbon\Carbon::parse($post->created_at)->format('l jS \\of F Y h:i:s A')}}</h5>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Comments
    </div>
    <div class="card-body">
        <form action="" method="POST">
            @csrf
            <label for="exampleFormControlTextarea1" class="form-label">By</label>
            <select name="creator" class="form-control">
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <div class="form-group">
                <textarea name="body" id="body" cols="15" rows="4" class="form-control" placeholder="Enter Your comment here"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Comment</button>
            </div>
        </form>

<!--        @if(count($post->comments) > 0)-->
<!--        @foreach($post->comments as $comment)-->
<!--        <div class="card">-->
<!--            <div class="card-header">-->
<!--                {{$comment->user->name}}-->
<!--            </div>-->
<!--            <div class="card-body">-->
<!--                <div>-->
<!--                    <span style="font-size: 1.2rem; font-weight: bold">Comment: </span>-->
<!--                    {{$comment->body}}-->
<!--                </div>-->
<!--                <div>-->
<!--                    <span style="font-size: 1rem; font-weight: bold">Created At: </span>-->
<!--                    {{ \Carbon\Carbon::parse($comment->created_at)->format('l jS \\of F Y h:i:s A') }}-->
<!--                </div>-->
<!--                <div>-->
<!--                    <span style="font-size: 1rem; font-weight: bold">By: </span>-->
<!--                    {{ $comment->user->name }}-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        @endforeach-->
<!--        @else-->
<!--        <div>No comments yet</div>-->
<!--        @endif-->
<!--    </div>-->
</div>


<!--        <form method="POST" action="{{ route('posts.show',$post->id)}}">-->
<!---->
<!--            <div class="mb-3">-->
<!--                <label for="exampleFormControlInput1" class="form-label">Title</label>-->
<!--                <input type="text" class="form-control" id="exampleFormControlInput1"  value="{{ $post->title }}">-->
<!--            </div>-->
<!--            <div class="mb-3">-->
<!--                <label for="exampleFormControlTextarea1" class="form-label">Description</label>-->
<!--                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $post->description }}</textarea>-->
<!--            </div>-->
<!---->
<!--            <div class="mb-3">-->
<!--                <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>-->
<!--                <select class="form-control">-->
<!--                    <option selected value="1">{{ $post->creator }}</option>-->
<!--                </select>-->
<!--            </div>-->
<!---->
<!--        </form>-->
@endsection

