@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('components.errors')

            <div class="card">
                <div class="card-header">Редкатирвоание статьи <i>{{ $article->title }}</i></div>
                <div class="card-body">
                    <form action="{{ route('article.edit.save', $article->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Заголовок статьи</label>
                            <input type="title" class="form-control" name="title" id="title" aria-describedby="title" placeholder="Введите заголовок" value="{{ $article->title }}">
                        </div>
                        <div class="form-group">
                            <label for="category">Выбор категории</label>
                            <select class="form-control" name="category">
                                <option value="{{ $article->rewiewerType->id }}" selected>
                                    {{ $article->rewiewerType->title }}
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
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
                            <textarea class="form-control" id="description" name="description" rows="3" maxlength="255">{{ $article->reviewer->description }}</textarea>
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="editFiles" onchange="openUploadFiles()">
                            <label class="form-check-label" for="editFiles">Изменить файлы</label>
                        </div>

                        <div class="newFile form-group">
                            <div class="form-group">
                                <label for="file">Загрузка файла</label>
                                <input type="file" class="form-control-file" name="file" id="file file-edit">
                            </div>
                            <div class="form-group">
                                <label for="file">Загрузка файла <b>PDF</b> <span class="color-red">*</span></label>
                                <input type="file" class="form-control-file" name="pdf" id="file file-edit">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Создать статью</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
