@extends('layouts.layout')

@section('title')Delete @endsection

@section('content')
<form method="POST" action="{{ route('posts.remove',$post->id)}}">
</form>

@endsection
