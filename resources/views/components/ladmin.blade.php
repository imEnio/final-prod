<!doctype html>
<html lang="ru-RU">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"/>

    @vite('resources/css/admin/admin.css')
    @vite('resources/sass/app.scss')

    @vite('resources/js/app.js')
    @vite('resources/js/admin/admin.js')

    @section('assets')

    @show
</head>
<body>
<div class="wrapper">
    <div class="left-nav">
        <div class="logo-bar">
            <span class="logo"></span>
        </div>
        <div class="left-menu">
            <a href="{{route("dashboard")}}" class="menu">
                <div class="icons">
                    <span class="m-dashboard-ic"></span>
                </div>
                <span class="nav-text">Dashboard</span>
            </a>
            <a href="{{route("users")}}" class="menu">
                <div class="icons">
                    <span class="m-users-ic"></span>
                </div>
                <span class="nav-text">Пользователи</span>
            </a>
            <a href="{{route("cities")}}" class="menu">
                <div class="icons">
                    <span class="m-cities-ic"></span>
                </div>
                <span class="nav-text">Города</span>
            </a>
            <a href="{{route("parks")}}" class="menu">
                <div class="icons">
                    <span class="m-parks-ic"></span>
                </div>
                <span class="nav-text">Парки</span>
            </a>
            <div class="under-menu">
                <a href="/" class="menu">
                    <div class="icons">
                        <span class="m-web-ic"></span>
                    </div>
                    <span class="nav-text">На главную</span>
                </a>
                <a href="{{route('logout')}}" class="menu">
                    <div class="icons">
                        <span class="m-logout-ic"></span>
                    </div>
                    <span class="nav-text">Выход</span>
                </a>
            </div>
        </div>
    </div>
    <div class="page-wrapper">
        <div class="header">
            <div class="nav">
                <div class="left">
                    <span id="today"></span>
                </div>
                <div class="right">
                    <div class="theme-switch">

                    </div>
                    <div class="notification">
                        <i class="bell"></i>
                    </div>
                    <a href="{{route('profile')}}">
                        <div class="profile">
                            <div class="data">
                                <span
                                    class="name">{{\Illuminate\Support\Facades\Auth::user()->name}} {{\Illuminate\Support\Facades\Auth::user()->surname}}</span>
                                <span class="login">
                                    @switch(\Illuminate\Support\Facades\Auth::user()->role)
                                        @case(2)
                                            [Менеджер]
                                            @break
                                        @case(3)
                                            [Администратор]
                                            @break
                                    @endswitch
                                </span>
                            </div>
                            <span class="circle-image">
                            <img
                                src="@if(\Illuminate\Support\Facades\Auth::user()->avatar) {{url('storage/' .\Illuminate\Support\Facades\Auth::user()->avatar)}} @else /assets/debug/img/testava.png @endif"
                                alt="404 Not Found" class="avatar-img">
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="content-wrapper">
            {{$content}}
            <div class="right-menu">
                <div class="chat-box">
                    <div class="msg-box">
                        @foreach($msg as $text)

                            <div class="msg-text-box">
                                <span class="circle-image chat-avatar">
                                    <img
                                        src="@if($text->user->avatar) {{url('storage/' .$text->user->avatar)}} @else /assets/debug/img/testava.png @endif"
                                        alt="404 Not Found" class="avatar-img">
                                </span>
                                <div class="msg-text-block">
                                    <span class="msg-from">От: {{$text->user->name}}</span>
                                    <span class="msg-text">{{$text->message}}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <form>
                        <input name="message" id="message" type="text" class="message-form" placeholder="Сообщение...">
                        <input class="send-msg" name="enter" type="button" value="Отправить" id="send-msg"/>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>
