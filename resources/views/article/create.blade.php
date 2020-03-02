@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('components.errors')

            <div class="card">
                <div class="card-header">Создание статьи</div>
                <div class="card-body">
                    <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Заголовок статьи <span class="color-red">*</span></label>
                            <input type="title" class="form-control" name="title" id="title" aria-describedby="title" placeholder="Введите заголовок">
                        </div>
                        <div class="form-group">
                            <label for="category">Выбор категории <span class="color-red">*</span></label>
                            <select class="form-control" name="category" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        @if ($category->subcategoryTitle)
                                            {{ $category->subcategoryTitle }} - 
                                        @endif
                                            {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">
                                @if(Auth::user()->role === 'corrector' || Auth::user()->role === 'admin')
                                Добавление <i><a href="{{ route('category.create') }}">категории</a></i>
                                @endif
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea class="form-control" id="description" name="description" rows="3" maxlength="255"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="file">Загрузка файла <b>DOC</b> <span class="color-red">*</span></label>
                            <input type="file" class="form-control-file" name="file" id="file">
                        </div>
                        <div class="form-group">
                            <label for="file">Загрузка файла <b>PDF</b> <span class="color-red">*</span></label>
                            <input type="file" class="form-control-file" name="pdf" id="file">
                        </div>
                        <i><span class="color-red">*</span> обязательные поля. </i> <br>
                        <button type="submit" class="btn btn-primary mb-2">Создать статью</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
