@extends('layouts.app')
@section('title','View Post')
@section('content')
    <div class="container">
        <div class="title">
            <h1>View Post</h1>
        </div>
        <a href="{{ url('post') }}" class="btn btn-sm btn-outline-primary mb-2">Back</a>
        <div class="card">
            <div class="card-body">
                <h3 for="">Title</h3>
                <p>{{ $post->title }}</p>
                <h3 for="">Body</h3>
                <p>{{ $post->body }}</p>
                <h3 for="">Post By</h3>
                <p>{{ $post->user->name }}</p>
                <h3 for="">Category</h3>
                <p>{{ $post->category->name }}</p>
            </div>
        </div>
    </div>
@endsection
