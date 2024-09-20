@extends('layouts.app')

@section('content')
    <div class="container">
        @auth
        <a href="{{ url('/categories/create')}}" class="btn btn-primary mb-2">
            +Create New
        </a>
        @endauth
        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div> 
        @endif
        @foreach($categories as $category)
          <div class="card mb-2">
            {{-- <div class="row">
                <div class="col-3">
                    image
                </div>
                <div class="col-9"> --}}
                    <div class="card-body">
                        <h2 class="card-title">
                            {{$category->name}}
                            @auth
                            <a href="/categories/{{ $category->id }}/edit" class="btn btn-warning">Edit</a> 
                            @endauth
                        </h2>
                        <div class="card-subtitle mb-2 text-muted small">
                            {{$category->created_at->diffForHumans()}}
                        </div>
                        <a class="card-link" href="{{url('/categories/'.$category->id)}}">More... &raquo;</a>
                       </div>
                  {{-- </div>
                </div> --}}
            </div>
            
        @endforeach
    </div>
@endsection