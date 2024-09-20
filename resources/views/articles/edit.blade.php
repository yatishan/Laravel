@extends("layouts.app")

@section("content")
    <div class="container">
        @if($errors->any())
        <div class="alert alert-warning">
            <ol>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ol>
        </div>
        @endif
        <form action="/articles/{{$article->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="mb-2">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" value="{{  $article->title}}">
            </div>
            <div class="mb-2">
                <label for="">Body</label>
                <textarea class="form-control" name="body" id="">{{ $article->body }}</textarea>
            </div>
            <div>
                <label for="">Category</label>
                <select name="category_id" class="form-control" id="">
                    @foreach($categories as $category)
                    <option value="{{$category["id"]}}" {{ $category->id===$article->category_id?"selected":""; }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label for="">Image</label>
                <input type="file" name="image" id="" class="form-control" accept="image/*">
            </div>
            <div class="col-3">
                <img style="width: 100px;" src="{{ Storage::url('articles/'.$article->image) }}" class="img-fluid rounded-start" alt="">
            </div>
            <div>
                <input type="submit" value="Update" class="btn btn-success mt-2">
            </div>
        </form>
    </div>
@endsection