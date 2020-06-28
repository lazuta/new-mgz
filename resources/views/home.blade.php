@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Панель управления</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if(Auth::user()->role === "reviewer" && empty(Auth::user()->reviewer))
                        Уважаемый(ая), <i>{{ Auth::user()->name }}</i>, роль "Рецензент" требует подтверждения админитсрацией ресурса. <br>
                        Благодарим за проявленное терпение!
                    @endif

                    <h3>Информация по аккаунту</h3>
                    <b>Роль:</b> {{ Auth::user()->role }} <br>
                    <b>ФИО:</b> {{ Auth::user()->name }} <br>
                    <b>Email:</b> {{ Auth::user()->email }} <br>
                    <b>Cтатус аккаунта:</b> Активен <br> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
