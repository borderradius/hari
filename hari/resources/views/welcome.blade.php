<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
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
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        @extends('layouts.master')

        @section('content')
            {{--  <p>저는 자식뷰의 'content' 섹션입니다.</p>  --}}
        

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                <!-- HTML 주석 안에서 {{$name}} 을 출력합니다. -->
                {{-- 블레이드 주석 안에서 {{$name}} 을 출력합니다. --}}
                    {{ $greeting or 'Hello ' }} {{ $name or '' }}
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
                <h3>IF문</h3>
                @if($itemCount = count($items))
                    <p>{{$itemCount}} 종류의 과일이 있습니다.</p>
                @endif
                <h3>반복문</h3>
                <ul>
                    @foreach ($items as $item)
                        <li> {{$item}} </li>
                    @endforeach
                </ul>
                <h3>forelse는 if와 foreach의 결합</h3>
                
                {{--  아래 코드를 적어줌으로써 @empty가 작동함을 알 수 있다. 라우팅시 view인자로 넘겨받은 변수 덮어쓰기, 디버깅이나 빠른 실험을 할수있다.  --}}
                <?php $items = []; ?> 
                <ul>
                    @forelse ($items as $item)
                        <li> {{$item}} </li>
                    @empty
                        <p>암것도 없네</p>
                    @endforelse
                </ul>
            </div>
        </div>
        @include('partials.footer')
        @endsection
    </body>
</html>
