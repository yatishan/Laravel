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
        <form action="{{url('/articles/store')}}" method="POST">
            @csrf
            <div class="mb-2">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" value="{{old('title')}}">
            </div>
            <div class="mb-2">
                <label for="">Body</label>
                <textarea class="form-control" name="body" id="">{{ old('body')}}</textarea>
            </div>
            <div>
                <label for="">Category</label>
                <select name="category_id" class="form-control" id="">
                    @foreach($categories as $category)
                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <input type="submit" value="Submit" class="btn btn-success mt-2">
            </div>
        </form>
    </div>
@endsection