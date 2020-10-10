@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('components.errors')

            <div class="card">
                <div class="card-header d-flex justify-content-between"> Статья: {{ $article->title }} 
                    @if ($article->user->id == Auth::id() || $article->user->role == 'admin')
                        <form action="{{ route('article.delete', $article->id) }}">
                            @csrf
                            <button type="submit">Удалить</button>
                        </form>
                        <a href="{{ route('article.edit', $article->id) }}">Изменить</a>
                    @endif
                </div>
                <div class="card-body">

                    <p>Категория: <i>{{ $article->rewiewerType->title }}</i></p>
                    <p><i>{{ $article->reviewer->description }}</i></p>
                    
                    @foreach ($article->file as $item)
                        <a href="{{ $item->file_path }}"> <p>Ссылка на скачивания файла</p></a>

                        @if(Auth::user()->role === 'reviewer' || Auth::user()->role === 'admin'|| $article->user->id == Auth::id())
                            <a href="{{ $item->pdf_path }}"> <p>Ссылка на скачивание файла в формате PDF</p></a>
                        @endif
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
                @elseif(Auth::user()->role == "reviewer" &&
                        !empty(Auth::user()->reviewer))
                    @include('comment.review')
                @endif
                
            </div>
            
            @foreach ($reviews as $item)
                <div class="card comment-card">
                    <div class="card-header d-flex justify-content-between">
                        Ревьюирование
                    </div>
                    <div class="card-body">
                        <a href="{{ $item->file[0]->file_path }}"> <p>Ссылка на скачивание файла</p></a>
                    </div>
                </div>
            @endforeach

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
