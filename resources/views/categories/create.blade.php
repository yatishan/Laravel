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
        <form action="{{url('/categories/store')}}" method="POST">
            @csrf
            <div class="mb-2">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
            </div>
            <div>
                <input type="submit" value="Submit" class="btn btn-success mt-2">
            </div>
        </form>
    </div>
@endsection