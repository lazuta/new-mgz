<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- TODO: перенести в файл --}}
    <style>
        .errors {
            margin-bottom: 0px;
            padding-bottom: 0px;
        }

        .message_form {
            margin-top: 20px;
        }

        .comment-card {
            margin-top: 20px;
        }
        
        .comment-name {
            margin-right: 8px;
        }

        .w-75 {
            margin-bottom: 10px;
        }

        .m-l {
            margin-left: 10px;
        }

        .form-group:last-child {
            margin-bottom: 5px;
            padding-bottom: 5px;
        }

        .navbar-brand {
            width: 35px;
        }

        .color-red {
            color: red;
        }

        .upper-bold {
            text-transform: uppercase;
            text-decoration: none;
            color: black;
            line-height: 16px;
        }

        .upper-bold:hover {
            text-decoration: none;
            color: #7bb57b;
        }

        .newFile {
            display: none;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <img class="navbar-brand" src="http://bsac.by/themes/custom/bsac/img/logo/bsac_logo.svg">
                <a href="{{ route('welcome') }}" class="upper-bold">Научный журнал <br> Проблемы инфокоммуникаций</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Авторизация') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(Auth::user()->role === 'admin')
                                        <i class="fas fa-star" title="Super administrator"></i>
                                    @elseif(Auth::user()->role === 'corrector')
                                        <i class="far fa-edit" title="Corrector"></i>
                                    @endif
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">Панель управления</a>

                                    @if(Auth::user()->role === 'author')
                                        <a class="dropdown-item" href="{{ route('article.create') }}">Создание статьи</a>
                                        <a class="dropdown-item" href="{{ route('article.show') }}">Мои статьи</a>
                                    @elseif(Auth::user()->role === 'reviewer')
                                        @if (Auth::user()->reviewer === true)
                                            <a class="dropdown-item" href="{{ route('article.show') }}">Статьи на рецензии</a>
                                        @endif
                                    @else
                                        <a class="dropdown-item" href="{{ route('category.show') }}">Категории</a>
                                        <a class="dropdown-item" href="{{ route('category.create') }}">Создание категории</a>
                                    @endif
                                    
                                    @if(Auth::user()->role === 'admin')
                                        <a class="dropdown-item" href="{{ route('users.show') }}">Рецензенты</a>
                                        <a class="dropdown-item" href="{{ route('users.appointment') }}">Статьи на рецензии</a>
                                    @endif

                                    <hr>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <footer>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous">
        </script>
        {{-- TODO: Create individual file--}}
        <script>
            $("#success-alert").fadeTo(5000, 500).slideUp(500, function(){
                $("#success-alert").slideUp(500);
            });

            function openUploadFiles() {
                let mode = document.querySelector('#editFiles').checked;
                let window = document.querySelector('.newFile');
                let fields = document.querySelectorAll('#file-edit');

                if(mode) {
                    window.style.display = 'block';
                }
                else {
                    window.style.display = 'none';
                    fields.forEach(el => {
                        el.value = 'null';
                    });
                }
            }
        </script>
    </footer>
</body>
</html>
