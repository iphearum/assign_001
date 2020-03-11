<form action="{{ route('post.store') }}" method="POST" class="form-group">
    @csrf
    <label for="">Title</label>
    <input class="form-control" type="text" name="title" placeholder="Title"/>
    <label for="">Body</label>
    <input class="form-control" type="text" name="body" placeholder="Body" "/>
    <br/>
    <button type="submit" class="btn btn-sm btn-primary float-right">Create</button>
</form>
