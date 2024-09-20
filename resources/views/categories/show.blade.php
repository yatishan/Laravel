@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-2">
            <div class="card-body">
                <h2 class="card-title">
                    {{$category->name}}
                </h2>
                <div class="card-subtitle mb-2 text-muted small">
                    {{$category->created_at->diffForHumans()}}
                </div>
                <form action="{{url('/categories/'.$category->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
               </div>
               @if(session('info'))
               <div class="alert alert-info">
                  {{ session('info') }}
               </div> 
               @endif
          </div>
    </div>
@endsection