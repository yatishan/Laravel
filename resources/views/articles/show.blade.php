@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-2">
            <div class="card-body">
                <h2 class="card-title">
                    {{$article->title}}
                </h2>
                <div class="card-subtitle mb-2 text-muted small">
                    {{$article->created_at->diffForHumans()}}
                </div>
                <p class="card-text">
                    {{$article->body}}
                </p>
                <form action="{{url('/articles/'.$article->id)}}" method="POST">
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
               <ul class="list-group">
                <li class="list-group-item bg-primary fw-bold text-white">
                  Comments ({{count($article->comments)}})
                </li>
                @foreach($article->comments as $comment)
                <li class="list-group-item">
                    <a href="{{ url('/comments/delete/' . $comment->id) }}" class="btn-close float-end"></a>
                    {{ $comment->content }}
                    <div class="small mt-2">
                        By <b>{{ $comment->user->name }}</b>
                        {{ $comment->created_at->diffForHumans() }}
                    </div>
                </li>
                @endforeach
              </ul>
              @auth
              <form action="{{url('/comments/store')}}" method="POST">
                @csrf
                <input type="hidden" name="article_id" value="{{$article->id}}">
                <textarea name="content" id="" class="form-control mb-2" placeholder="New Comment"></textarea>
                <button class="btn btn-secondary" type="submit">Add Comment</button>
            </form>
            @endauth
            @guest
            <div class="alert alert-secondary">
                Please register/login to add comment 
                <a href="{{url('login')}}" class="btn btn-link p-0">login</a>
            </div>
            @endguest
          </div>
    </div>
@endsection