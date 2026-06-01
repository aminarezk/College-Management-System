<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{__('language.College Management System')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            body{
                background: linear-gradient(to right, #dbeafe, #f8fafc);
                font-family: Arial, sans-serif;
            }

            .main-wrapper{
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                position: relative;
                text-align: center;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
                z-index: 999;
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

            .welcome-card{
                background: white;
                padding: 50px;
                border-radius: 25px;
                box-shadow: 0 10px 25px rgba(0,0,0,0.1);
                text-align: center;
                width: 700px;
            }

            .welcome-card h1{
                color: #1e3a8a;
                font-size: 45px;
                margin-bottom: 20px;
            }

            .welcome-card p{
                font-size: 22px;
                color: #555;
                margin-bottom: 15px;
            }

            .welcome-card span{
                color: #2563eb;
                font-weight: bold;
            }

            .emoji{
                font-size: 60px;
                margin-bottom: 15px;
            }

            .top-right.links a{
                text-decoration: none;
                margin-left: 10px;
                padding: 10px 25px;
                border-radius: 25px;
                font-weight: bold;
            }

            .btn-login{
                border: 2px solid #2563eb;
                color: #2563eb;
            }

            .btn-register{
                background: #2563eb;
                color: white !important;
            }
        </style>
    </head>

    <body>

        <div class="main-wrapper">
             <ul class="navbar-nav ml-auto">
            @if (Route::has('login'))
                <div class="top-right links">

                    @auth
                        <a href="{{ url('/home') }}">{{__('language.Home')}}</a>
                    @else
                           @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                       <a class="btn-login" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                             {{ $properties['native'] }}
                         </a>
                             @endforeach

                        <a href="{{ route('login') }}" class="btn-register">
                           {{__('language.Login')}} 
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn-register">
                                {{__('language.Register')}}
                            </a>
                        @endif

                    @endauth
                </div>
            @endif

            <div class="welcome-card">

                <div class="emoji">🎓</div>

                <h1>{{__('language.Welcome Students')}}</h1>

                <p>
                    {{__('language.New student? Start your journey and create your account from')}}
                    <span>{{__('language.Register')}}</span> ✨
                </p>

                <p>
                    {{__('language.Already have an account?')}}
                    <span>{{__('language.Login')}}</span>
                    {{__('language.to view your grades and academic information.')}}
                </p>

            </div>

        </div>

    </body>
</html>