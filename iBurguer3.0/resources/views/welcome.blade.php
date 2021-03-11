<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>iBurguer</title>

        <link rel="stylesheet" href="{{url('css/home_style.css')}}">

        
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen sm:items-center sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 text-align:center">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0" id="iburguer">
                    <h1>iBurguer</h1>
                    <div class="login_holder">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline hidden fixed px-6 py-4 sm:block">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline sm:justify-end ">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline ">Registrar</a>
                            @endif
                        @endauth
                    </div>
                </div>

                <div class="mt-8 bg-white background-color:#fff overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="p-6-content">
                                <h1>Tá com fome?</h1>
                                <h2>Chama um iBurguer!</h2>
                                <h3>Seu aplicativo de delivery</h3>
                            </div>
                        </div>
                        
                        <div class="img">
                        </div>
                    </div>
            </div>
        </div>
    </body>
</html>
