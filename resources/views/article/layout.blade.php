@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('components.errors')

            <div class="card">
                <div class="card-header"> {{ $article->title }} </div>
                <div class="card-body">
                    @foreach ($article->file as $item)
                        <a href="{{ $item->file_path }}"> Ссылка</a>
                    @endforeach

                    @include('comment.create')
                </div>
            </div>
            @foreach ($comments as $comment)
            <div class="card comment-card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <b class="comment-name">{{ $comment->user->name }}</b>

                        @if($comment->approved == 1)
                            <span class="badge badge-success">Одбрена к публикации</span>
                        @elseif($comment->approved == 0)
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
