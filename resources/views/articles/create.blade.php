@extends('layouts.app')

@section('content')
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
        <form action="{{url('/articles/store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" value="{{old('title')}}" required>
            </div>
            <div class="mb-2">
                <label for="">Body</label>
                <textarea class="form-control" name="body" id="" required>{{ old('body')}}</textarea>
            </div>
            <div>
                <label for="">Category</label>
                <select name="category_id" class="form-control" id="" required>
                    @foreach($categories as $category)
                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label for="">Image</label>
                <input type="file" name="image" id="" class="form-control" accept="image/*">
            </div>
            <div>
                <input type="submit" value="Submit" class="btn btn-success mt-2">
            </div>
        </form>
    </div>
@endsection