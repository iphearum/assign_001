@extends('layouts.app')
@section('title','Edit Post')
@section('content')
    <div class="container">
        <div class="title">
            <h1>Edit Post</h1>
        </div>
        <a href="{{ url('post') }}" class="btn btn-sm btn-outline-primary mb-2">Back</a>
        <form action="{{ route('post.update',$post->id) }}" method="post" class="form-group" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset("images/$post->image")}}" alt="" srcset="" width="100%">
                    <input type="file" name="image" accept="image/*">
                </div>
                <div class="col-8">
                    <label for="">Title</label>
                    <input class="form-control" type="text" name="title" value="{{ $post->title }}"/>
                    <label for="">Body</label>
                    <input class="form-control" type="text" name="body" value="{{ $post->body }}"/>
                    <label for="">Category</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option class="form-control" type="text" name="body" value="{{$category->id }}" {{ $post->category->id == $category->id? "selected": "" }}>{{$category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br/>
            <button type="submit" class="btn btn-sm btn-primary">Update</button>
        </form>
    </div>
@endsection
