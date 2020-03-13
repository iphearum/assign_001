<form action="{{ route('post.store') }}" method="POST" class="form-group">
    @csrf
    <button type="submit" class="btn btn-primary float-right mb-3">Create</button>
    <label for="">Title</label>
    <input class="form-control" type="text" name="title" placeholder="Title"/>
    <label for="">Body</label>
    <input class="form-control" type="text" name="body" placeholder="Body"/>
    <label for="">Catogory</label> <br/>
    <select name="category_id" class="form-control">
        @foreach($categories as $category)
            <option value="category_id">{{ $category->name }}</option>
        @endforeach
    </select>
    <br/>
</form>
