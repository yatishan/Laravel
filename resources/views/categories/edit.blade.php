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
        <form action="/categories/{{$category->id}}" method="POST">
            @csrf
            @method("PUT")
            <div class="mb-2">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" value="{{  $category->name}}">
            </div>
            <div>
                <input type="submit" value="Update" class="btn btn-success mt-2">
            </div>
        </form>
    </div>
@endsection