@extends('base')
@section('title','Edit Post')
@section('content')
    <div class="title">
        <h1>Edit Post</h1>
    </div>
    <a href="{{ url('post') }}" class="btn btn-link">Back</a>
    <form action="{{ route('post.update',$post->id) }}" method="post" class="form-group">
        @csrf
        @method('PUT')
        <label for="">Title</label>
        <input class="form-control" type="text" name="title" value="{{ $post->title }}"/>
        <label for="">Body</label>
        <input class="form-control" type="text" name="body" value="{{ $post->body }}"/>
        <br/>
        <button type="submit" class="btn btn-sm btn-primary">Update</button>
    </form>
@endsection
