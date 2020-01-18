@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Статьи</div>

                <div class="card-body">

                    <a class="btn btn-primary" role="button"  href="{{ route('article.create') }}">Создать статью </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
