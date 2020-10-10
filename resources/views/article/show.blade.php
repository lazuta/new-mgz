@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Статьи</div>

                <div class="card-body">
                    <div class="list-group">
                        @foreach ($articles as $article)
                            @if(Auth::user()->role === 'author')
                                @if ($article->user->id == Auth::id() && Auth::user()->role === "author")
                                    <a href="{{ route('article.showArticle', $article->id) }}" class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $article->title }}
                                            {{-- <span class="badge badge-primary badge-pill">{{ $article->status }}</span> --}}
                                    </a>
                                @endif
                            @elseif(Auth::user()->role === 'corrector' || Auth::user()->role === 'admin')
                                <a href="{{ route('article.showArticle', $article->id) }}" class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $article->title }}
                                </a>
                            @endif
                        @endforeach

                        @if(Auth::user()->role === 'reviewer' && !empty(Auth::user()->reviewer))
                            @foreach ($reviewsArticle as $article)
                                <a href="{{ route('article.showArticle', $article->review->article->id) }}" class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $article->review->article->title }}
                                </a>
                            @endforeach
                        @endif
                        
                    </div>
                    <br>
                    @if(Auth::user()->role === 'author' || Auth::user()->role === 'admin')
                        <a class="btn btn-primary" role="button"  href="{{ route('article.create') }}">Создать статью </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
