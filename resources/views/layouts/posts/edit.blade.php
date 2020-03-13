@extends('layouts.app')
@section('title','Edit Post')
@section('content')
    <div class="container">
        <div class="title">
            <h1>Edit Post</h1>
        </div>
        <a href="{{ url('post') }}" class="btn btn-sm btn-outline-primary mb-2">Back</a>
        <form action="{{ route('post.update',$post->id) }}" method="post" class="form-group">
            @csrf
            @method('PUT')
            <label for="">Title</label>
            <input class="form-control" type="text" name="title" value="{{ $post->title }}"/>
            <label for="">Body</label>
            <input class="form-control" type="text" name="body" value="{{ $post->body }}"/>
            <label for="">Category</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option class="form-control" type="text" name="body" value="{{$category->name }}" {{ $post->category->id == $category->id? "selected": "" }}>{{$category->name }}</option>
                @endforeach
            </select>
            <br/>
            <button type="submit" class="btn btn-sm btn-primary">Update</button>
        </form>
    </div>
@endsection
