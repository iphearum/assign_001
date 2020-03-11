@extends('base')
@section('title','View Post')
@section('content')
    <div class="title">
        <h1>View Post</h1>
    </div>
    <a href="{{ url('post') }}" class="btn btn-link">Back</a>
    <div class="card">
        <div class="card-body">
            <h3 for="">Title</h3>
            <p>{{ $post->title }}</p>
            <h3 for="">Body</h3>
            <p>{{ $post->body }}</p>
        </div>
    </div>
@endsection
