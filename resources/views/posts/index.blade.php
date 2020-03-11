@extends('base')
@section('title','List Post')
@section('content')
    <div class="card">
        <div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
        <div class="title">
            <h1>List Post</h1>
        </div>
        <button onclick="show_post()" class="btn btn-sm btn-primary">Post</button>
        <div class="card p-2" id="hidden" style="display: none">
            @include('posts.create')
        </div>
        <table class="table">
            <thead class="text-center">
                <tr>
                    <th scope="col">N</th>
                    <th scope="col">title</th>
                    <th scope="col">Body</th>
                    <th scope="col" width="180">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $key => $post)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ substr($post->body,0,100)."..." }}</td>
                    <td colspan="2">
                        <form action="{{route('post.destroy',$post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('post.show',$post->id) }}" class="btn btn-sm btn-outline-info">View</a>
                            <a href="{{ route('post.edit',$post->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <a href="{{ route('post.destroy',$post->id) }}" class="btn btn-sm btn-outline-danger">Delete</a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br/>
    <div class="link">{{ $posts->links() }}</div>
    <script>
        function show_post() {
            var show = document.getElementById('hidden');
            show.style.display = 'block';
        }
    </script>
@endsection
