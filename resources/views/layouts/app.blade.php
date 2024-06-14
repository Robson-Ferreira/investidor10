<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>

    </head>
    <body>
        <div class="container">
            <div class="menu">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" class="img-logo">
                </div>

                <div class="menu-info">
                    <a class="menu-button" href="{{ route('newspaper.create') }}">CADASTRAR NOTÍCIAS</a>
                    <a class="menu-button" href="/">EXIBIR NOTÍCIAS</a>
                    <div class="search-container">
                        <span class="search-icon">&#128269;</span>
                        <input type="text" class="search" id="search" value="{{ isset($search) ? $search : '' }}">
                    </div>
                </div>
            </div>
            <div class="root">
                @yield('content')
            </div>
            <div class="wrapper"></div>
            <div class="footer">
                <span>DESENVOLVIDO POR ROBSON DURVAL</span>
            </div>
        </div>
    </body>
</html>
