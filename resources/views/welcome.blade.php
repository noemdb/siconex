<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="{{ asset('vendor/bootstrap/4.1.2/css/bootstrap.css') }}" rel="stylesheet">

        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))

                <div class="top-right links">

                    @auth
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ route('login') }}">Ingresar</a>
                        {{-- <a href="{{ route('register') }}">Registrar</a> --}}
                    @endauth

                </div>

            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{ config('app.name', 'Laravel') }}
                </div>

                <div class="links">
                    <a href="#">Documentación</a>
                    <a href="#">Demostración</a>
                    <a href="#">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
