<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            html, body {
                background-color: #F9F9F9;
                color: #1D3F75;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: auto;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .section-1 {
                position: relative;
            }

            #description > img {
                width: 100%;
            }

            .container-welcome {
                max-width: 1280px;
                margin: 0 auto;
                padding: 0px 20px;
            }

            .center {
                text-align: center;
                margin-bottom: 20px;
            }

            .alfa {
                color: white;
                font-size: 30px;
                font-weight: bold;
                background-color: #DC3545;
                padding: 10px 22px;
                border-radius: 15px 0px 15px 0px;
            }

            .alfa-version {
                font-weight: bold;
            }

            .more {
                position: absolute;
                bottom: 30px;
                font-size: 30px;
                line-height: 10px;
            }

            .more i {
                transform: rotate(90deg);
            }

            .row-magazine {
                width: 100%;
                display: flex;
                justify-content: center;
                flex-direction: row;
            }

            .justify {
                width: 90%;
                display: flex;
                align-items: center;
                font-size: 16px;
            }

            .justify p {
                text-align: justify;
            }

            .red {
                font-size: 18px;
                font-weight: bold;
                color: red;
            }

            @media(max-width: 960px) {
                .row-magazine {
                    flex-direction: column;
                }

                .justify {
                    width: 100%;
                }
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height section-1">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Личный кабинет</a>
                    @else
                        <a href="{{ route('login') }}">Авторизация</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Регистрация</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                {{-- <span class="alfa">ALFA</span><br>
                <span class="alfa-version">version 0.0.16</span> --}}

                <div class="title m-b-md">
                    Проблемы инфокоммуникаций
                </div>

                <div class="links">
                    <a href="http://bsac.by/projects/youth-in-science/2017/07/10/%D0%BD%D0%B0%D1%83%D1%87%D0%BD%D1%8B%D0%B9-%D0%B6%D1%83%D1%80%D0%BD%D0%B0%D0%BB-%D0%BF%D1%80%D0%BE%D0%B1%D0%BB%D0%B5%D0%BC%D1%8B-%D0%B8%D0%BD%D1%84%D0%BE%D0%BA%D0%BE%D0%BC%D0%BC%D1%83%D0%BD-2/">Научный журнал</a>
                </div>
            </div>

            <div class="more">
                <i class="fas fa-angle-double-right"></i>
            </div>
        </div>
        <div class="d-flex flex-column  container-welcome">
            <div>
                <h1 class="center">Научный журнал «Проблемы инфокоммуникаций» учрежден 25 июня 2015 года решением Совета УО ВГКС</h1>
            </div>
            <div class="row-magazine">
                <div class="justify">
                    <p>Предназначен для публикации материалов научно-практических исследований научных сотрудников, профессорско-преподавательского состава, студентов, магистрантов и аспирантов, а также специалистов, работающих в области электросвязи и почтовой связи. <br><br> Периодичность издания – 2 раза в год.
                    </p>
                </div>
                <div id="description">
                    <img src="{{ asset('images/magazine.png') }}" alt="">
                </div>
            </div>
            <div>
                <p>В журнале публикуются материалы, относящиеся к следующим отраслям знания: </p>
                <ul>
                    <li>Цифровая связь (Digital Communications);</li>
                    <li>Вычислительные системы и сети (Computing Systems and Networks);</li>
                    <li>Информационная безопасность (Information Security);</li>
                    <li>Технологии связи (Communication Technologies);</li>
                    <li>Радиотехника и электроника (Radio Engineering and Electronics);</li>
                    <li>Киберфизические системы (Cyberphysical Systems);</li>
                    <li>Экономика и управление в отрасли связи (Economicsand Managementinthe Telecommunications Industry);</li>
                    <li>Почтовая связь (Postal Services).</li>
                </ul>
            </div>
        </div>

    </body>
</html>
