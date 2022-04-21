@extends('layouts.layout')

@section('title')Create @endsection

@section('content')
        <form method="POST" action="{{ route('posts.store')}}"  enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="Enter Post Title" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Enter Post Description" name="description" rows="3"></textarea>
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

