 @extends('layouts.app')

@section('title')Edit @endsection

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
        <form style="width:66%; margin-left:300px;" method="POST" action="{{ route('posts.update',$post->id)}}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control" style="width: 66%" id="exampleFormControlInput1" name="title" value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" style="width: 66%" id="exampleFormControlTextarea1" name="description" rows="3">{{ $post->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
                <select  style="width: 66%" class="form-control" name="creator">
                    @foreach ($users as $user)
                    <option selected="selected" value="{{ $user->id}}">{{ $user->name }}</option>
                 @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label class="exampleFormControlTextarea1">Post Image</label>
                <div class="col-md-8 form-control" style="height: 85px;">
                 <img   id="original" src="{{asset('/storage/images/'.$post->image)}}" height="70" width="70">
                 <input type="file" name="image" value="{{ $post->image }}" />
                </div>
               </div>


          <button class="btn btn-success" style="margin-top: 16px; width:104px; margin-left:200px;">Edit</button>
        </form>
@endsection

