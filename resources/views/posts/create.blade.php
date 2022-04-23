@extends('layouts.layout')

@section('title')Create @endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form method="POST" action="{{ route('posts.store')}}"  enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror  " name="title" id="exampleFormControlInput1" placeholder="Enter Post Title" value="{{ old('title') }}">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror " id="exampleFormControlTextarea1" placeholder="Enter Post Description" name="description" rows="3"></textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
                <select class="form-control" name="creator">
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">
                        {{ $user->name }}
                    </option>
                @endforeach

                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Post Image</label>
                <input type="file" class="form-control" name="image" />
            </div>
            {{--  <div class="mb-3">
            <input class="input--style-1 js-datepicker" type="date" placeholder="Post Created At" name="creationDate" value="{{ old('created_at') }}">
            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
            </div>  --}}

          <button class="btn btn-success">Create</button>
        </form>
@endsection

