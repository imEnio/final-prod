<!doctype html>
<html lang="ru-RU">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"/>

    @vite('resources/sass/app.scss')
    @vite('resources/css/public/public.css')

    @vite('resources/js/app.js')

    @section('assets')

    @show
</head>
<body>
<div class="wrapper">
    <div class="header">
        <div class="header-logo">
            POCKETWORLD
        </div>
        <div class="header-nav">
            <button type="button" class="header-btn" data-bs-toggle="modal" data-bs-target="#currencyModal">
                <span class="currency"></span>
            </button>
            <button type="button" class="header-btn" data-bs-toggle="modal" data-bs-target="#languageModal">
                <span class="language"></span>
            </button>
        </div>
        <div class="header-search">
            <form action="">
                <input type="search" placeholder="Поиск..."/>
            </form>
        </div>
        <div class="header-auth">
            @if(!\Illuminate\Support\Facades\Auth::user())
            <a href="{{route('public.auth')}}">
                <button type="button" class="auth-btn">
                    <span class="auth"> Войти</span>
                </button>
            </a>
            @else
                <a href="{{route('logout')}}">
                    <button type="button" class="auth-btn">
                        <span class="logout"> Выйти</span>
                    </button>
                </a>
            @endif
        </div>
    </div>
    <div class="nav-bar">
        <div class="nav-content">
            <span class="nav-btn city"> Города</span>
            <span class="nav-btn parks"> Парки</span>
        </div>
    </div>

    @yield('content')
</div>

<div class="modal fade" id="currencyModal" tabindex="-1" aria-labelledby="currencyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="currencyModalLabel">Выбор валюты</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="languageModal" tabindex="-1" aria-labelledby="languageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="languageModalLabel">Выбор языка</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
