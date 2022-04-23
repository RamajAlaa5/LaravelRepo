
@extends('layouts.layout')

@section('title')Delete Comment @endsection

@section('content')
<form method="POST" action="{{ route('comments.remove',$comment->id) }}">
    @csrf
    @method("DELETE")
    <button type="submit" class="btn-danger">Delete</button>

</form>

@endsection
