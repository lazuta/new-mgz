@extends('admin.admin')

@section('content')

<div class="container">
    @IF(Auth::user()->role === "reviewer" && empty(Auth::user()->reviewer))
        <div class="alert-information" style="margin-bottom: 20px;">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Внимаение!</div>
                            <div class="p mb-0 text-gray-800">
                                Уважаемый(ая), <i>{{ Auth::user()->name }}</i>, роль "Рецензент" требует подтверждения админитсрацией ресурса. <br>
                                Благодарим за проявленное терпение!
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @ENDIF

    <div class="card">
        <div class="card-header">Панель управления</div>

        <div class="card-body">
            <h3>Информация по аккаунту</h3>
            <b>Роль:</b> {{ Auth::user()->role }} <br>
            <b>ФИО:</b> {{ Auth::user()->name }} <br>
            <b>Email:</b> {{ Auth::user()->email }} <br>
            <b>Cтатус аккаунта:</b> Активен <br> 
        </div>
    </div>
</div>
@endsection
