@extends('layouts.app')
@section('title','View Post')
@section('content')
    <div class="container">
        <div class="title">
            <h1>View Post</h1>
        </div>
        <a href="{{ url('post') }}" class="btn btn-sm btn-outline-primary mb-2">Back</a>
        <div class="card">
            <div class="card-body row">
                <div class="col-4 p-2">
                    <img src="{{ asset("images/$post->image")}}" alt="" srcset="" width="100%">
                </div>
                <div class="col-8">
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
    </div>
@endsection
