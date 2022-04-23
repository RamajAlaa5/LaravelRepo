@extends('layouts.layout')

@section('title')edit Comment @endsection

@section('content')
<div class="card">
    <div class="card-header">
        All Comments
    </div>
    <div class="card-body">
        <form action="{{route('comments.update', ['commentable_id' => $comment->id)]}}" method="POST">
            @csrf
            @method('PUT')
            <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
            <select name="creator" class="form-control">
                @foreach ($users as $user)
                <option selected="selected" value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <div class="form-group">
                <textarea name="body" id="body" cols="15" rows="4" class="form-control" placeholder="Enter Your comment here"></textarea>
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Edit Comment</button>
            </div>
        </form>
        <br>
    </div>

@endsection
