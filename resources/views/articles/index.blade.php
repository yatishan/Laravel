@extends('layouts.app')

@section('content')
    <div class="container">
        @auth
        <a href="{{ url('/articles/create')}}" class="btn btn-primary mb-2">
            +Create New
        </a>
        @endauth
        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div> 
        @endif
        @foreach($articles as $article)
          <div class="card mb-2">
            <div class="card-body">
                <h2 class="card-title">
                    {{$article->title}}
                    @auth
                    <a href="/articles/{{ $article->id }}/edit" class="btn btn-warning">Edit</a> 
                    @endauth
                </h2>
                <div class="card-subtitle mb-2 text-muted small">
                    {{$article->created_at->diffForHumans()}}
                </div>
                <p class="card-text">
                    {{$article->body}}
                </p>
                <a class="card-link" href="{{url('/articles/'.$article->id)}}">More... &raquo;</a>
               </div>
          </div>
        @endforeach
        {{ $articles->links() }}
    </div>
@endsection