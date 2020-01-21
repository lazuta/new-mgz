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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
