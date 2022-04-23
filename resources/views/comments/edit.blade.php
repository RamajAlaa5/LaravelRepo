@extends('layouts.layout')

@section('title')edit Comment @endsection

@section('content')
<div class="card">
    <div class="card-header">
        All Comments
    </div>
    <div class="card-body">
        <form action="{{route('comments.update',$comment->id)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <textarea name="body" id="body" cols="15" rows="4" class="form-control" placeholder="Enter Your comment here">{{ $comment->body }}</textarea>
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Edit Comment</button>
            </div>
        </form>
        <br>
    </div>

@endsection
