<form action="{{ route('post.store') }}" method="POST" class="form-group" enctype="multipart/form-data">
    @csrf
    <button type="submit" class="btn btn-primary float-right mb-3">Create</button>
    <label for="">Title</label>
    <input class="form-control" type="text" name="title" placeholder="Title" value="1234567"/>
    <label for="">Body</label>
    <input class="form-control" type="text" name="body" placeholder="Body" value="1234567"/>
    <label for="">Catogory</label> <br/>
    <select name="category_id" class="form-control">
        @foreach($categories as $category)
            <option value="{{$category->id}}" name="category_id">{{ $category->name }}</option>
        @endforeach
    </select>
    <img src="" id="source_image" alt="" srcset="">
    <input type="file" name="image" accept="image/*">
    <br/>
</form>
