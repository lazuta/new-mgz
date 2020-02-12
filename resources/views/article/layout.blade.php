@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('components.errors')

            <div class="card">
                <div class="card-header d-flex justify-content-between"> {{ $article->title }} 
                    @if($article->user->id == Auth::id())
                        <a href="{{ route('article.edit', $article->id) }}">Изменить</a>
                    @endif
                </div>
                <div class="card-body">
                    <p>{{ $article->rewiewerType->title }}</p>
                    <p>{{ $article->reviewer->description }}</p>
                    @foreach ($article->file as $item)
                        <a href="{{ $item->file_path }}"> <p>Ссылка</p></a>
                    @endforeach
                    <p>
                        Текущая оценка:
                        @if ($article->reviewer->mark == 3)
                            <span class="badge badge-success">хорошо</span>.
                        @elseif ($article->reviewer->mark == 2)
                            <span class="badge badge-warning">удовлетворительно</span>.
                        @elseif (empty($article->reviewer->mark))
                            <span class="badge badge-light">оценка не поставлена</span>.
                        @else
                            <span class="badge badge-danger">плохо</span>.
                        @endif
                    </p>
                </div>
                
                @if(Auth::user()->role == "corrector")
                    @include('comment.create')
                @endif
            </div>
            @foreach ($comments as $comment)
            <div class="card comment-card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <b class="comment-name">{{ $comment->user->name }}</b>

                        @if ($comment->approved == 1)
                            <span class="badge badge-success">Одбрена к публикации</span>
                        @elseif ($comment->approved == 0)
                            <span class="badge badge-danger">Отказано в публикации</span>
                        @else
                            <span class="badge badge-warning">Требуется доработка</span>
                        @endif
                    </div>
                    <i>{{ $comment->created_at }}</i>
                </div>
                <div class="card-body">
                    {{$comment->body}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
