@extends('layouts.app')

{{-- 
    Подтверждение рецензента
    Доступ: для супер-администраторов 
--}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
       @foreach ($users as $user)
            @if(empty($user->reviewer))
                <div class="card w-75">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }} (<small>{{ $user->email }}</small>)</h5>
                        <p class="card-text">Заявка на утверждение роли корректора.</p>
                        <div class="d-flex flex-between-space">
                            <div>
                                <form method="POST" action="{{ route('users.approve', $user->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success">Одобрить заявку</button>
                                </form>
                            </div>
                            <div>
                                <form method="POST" action="{{ route('users.denied', $user->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger m-l">Отказать в заявке</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($user->reviewer == true)
                <h3>Одобренные кандидаты</h3>
                <div class="card w-75">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }} (<small>{{ $user->email }}</small>)</h5>
                        <p class="card-text">Данный рецензент утвержден.</p>
                        <div class="d-flex flex-between-space">
                            <div>
                                <form method="POST" action="{{ route('users.denied', $user->id) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger m-l">Расжаловать</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
       @endforeach
    </div>
</div>
@endsection
