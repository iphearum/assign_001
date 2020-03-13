@extends('layouts.app')
@section('title','List Post')
@section('content')
    <div class="container">
        <div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
        <button onclick="show_post()" class="btn btn-primary float-right mt-2">Post</button>
        <div class="title">
            <h1>List Post</h1>
        </div>
        <div class="card p-2" id="hidden" style="display: none">
            @include('layouts.posts.create')
        </div>
        <div class="card">
            @if (count($posts) !=0)
                <table class="table">
                    <thead class="text-center">
                    <tr>
                        <th scope="col">N</th>
                        <th scope="col">title</th>
                        <th scope="col">Body</th>
                        <th scope="col">Post By</th>
                        <th scope="col">Category</th>
                        <th scope="col" width="180">action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $key => $post)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ substr($post->body,0,50)."..." }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td colspan="2">
                                <form action="{{route('post.destroy',$post->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('post.show',$post->id) }}"
                                       class="btn btn-sm btn-outline-info">View</a>
                                    <a href="{{ route('post.edit',$post->id) }}"
                                       class="btn btn-sm btn-outline-primary">Edit</a>
                                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center">
                    <h3>No datas collection</h3>
                </div>
            @endif
        </div>
        <br/>
        <div class="link">{{ $posts->links() }}</div>
    </div>
    <script>
        function show_post() {
            var show = document.getElementById('hidden');
            show.style.display = 'block';
        }
    </script>
@endsection
