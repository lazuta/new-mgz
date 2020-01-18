@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            {{-- TODO: Подключить вывод ошибок --}}

            <div class="card">
                <div class="card-header">Главная > Категории > <i>Создание</i></div>

                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Добавить категорию</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Добавить подкатегорию</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <br>
                            <form action="{{ route('category.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="category">Название категории</label>
                                    <input type="text" class="form-control" id="category" name="category" placeholder="Название категории" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mb-2">Создать категорию</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <br>
                            <form action="{{ route('category.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="subcategory">Название подкатегори</label>
                                    <input type="text" class="form-control" id="subcategory" name="subcategory" placeholder="Название категории" required>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="category" required>
                                        <option disabled selected>Выберите категорию</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mb-2">Создать подкатегорию</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
