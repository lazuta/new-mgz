<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
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

            #description {
                width: 100%;
                overflow: hidden;
                margin: 0 auto;
                display: flex;
                justify-content: center;
                align-items: center
            }

            #description > img {
                width: 80%;
            }

            .container-welcome {
                max-width: 1280px;
                margin: 0 auto;
                padding: 0px 20px;
            }

            .center {
                text-align: center;
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
                <span class="alfa">ALFA</span><br>
                <span class="alfa-version">version 0.0.16</span>

                <div class="title m-b-md">
                    Проблемы инфокоммуникаций
                </div>

                <div class="links">
                    <a href="http://bsac.by/projects/youth-in-science/2017/07/10/%D0%BD%D0%B0%D1%83%D1%87%D0%BD%D1%8B%D0%B9-%D0%B6%D1%83%D1%80%D0%BD%D0%B0%D0%BB-%D0%BF%D1%80%D0%BE%D0%B1%D0%BB%D0%B5%D0%BC%D1%8B-%D0%B8%D0%BD%D1%84%D0%BE%D0%BA%D0%BE%D0%BC%D0%BC%D1%83%D0%BD-2/">Научный журнал</a>
                </div>
            </div>

            <div class="more">
                V <br>
                V
            </div>
        </div>
        <div class="d-flex flex-column full-height container-welcome">
            <div>
                <h1 class="center">Научный журнал «Проблемы инфокоммуникаций» учрежден 25 июня 2015 года решением Совета УО ВГКС</h1>
            </div>
            <div id="description">
                <img src="{{ asset('images/magazine.png') }}" alt="">
            </div>
            <div>
                <p class="center">Предназначен для публикации материалов научно-практических исследований научных сотрудников, профессорско-преподавательского состава, студентов, магистрантов и аспирантов, а также специалистов, работающих в области электросвязи и почтовой связи.</p>
            </div>
        </div>
        
    </body>
</html>
