
@extends('layouts.layout')

@section('title')Delete Comment @endsection

@section('content')
<form method="POST" action="{{route('comments.remove',[ ['commentable_id' => $comment->id)]])}}">
</form>

@endsection
