@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Доступные категории и подкатегории</div>

                <div class="card-body">
                    <ul>
                        @foreach ($categories as $category)
                            <li>
                                {{ $category->title}}
                                @if($category->subcategoryTitle)
                                - {{ $category->subcategoryTitle }}
                                @endif
                            </li>
                        @endforeach
                    </ul>

                    <a class="btn btn-primary" role="button"  href="{{ route('category.create') }}">Создать категорию</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
