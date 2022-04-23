@extends('layouts.layout')

@section('title')Delete @endsection

@section('content')
<form method="POST" action="{{ route('posts.remove',$post->id)}}">
    @csrf
    {{--  @method('DELETE')  --}}
{{--  <a href="{{ route('posts.remove',$post->id) }}" class="btn btn-danger">Delete</a>  --}}

</form>

@endsection
