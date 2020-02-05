@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @include('components.errors')

        <div class="col-md-8">
            @foreach ($articles as $article)
                <div class="card w-75">
                    <div class="card-body">
                        <h5 class="card-title"><a href=" {{ route('article.showArticle', $article->article->id) }} ">{{ $article->article->title }}</a></h5>
                        <h6 class="card-subtitle mb-2 text-muted">?Author?</h6>
                        <p class="card-text">{{ $article->article->decription }}</p>

                        <form action="{{ route('users.approving') }}" method="POST">
                            @csrf
                            <input name="invisible" type="hidden" value="{{ $article->article->id }}">
                            <div class="form-group">
                                <select class="form-control" name="rewiewer">
                                    <option selected disabled>Выберите рецензента</option>
                                    @foreach ($rewiewers as $rewiewer)
                                        <option value="{{ $rewiewer->id }}"> {{ $rewiewer->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary">Утвердить</button>
                            </div>
                        </form>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
