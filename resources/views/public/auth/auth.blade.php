@extends('components.backup.lauthpublic')
@section('assets')
    @vite('')
@endsection
@section('content')
    <div class="content">
        <div class="form">
            <div class="change-form">
                <a href="{{route('public.auth')}}">
                    <span class="switch-form sing-in active">Вход</span>
                </a>
                <a href="/registration">
                    <span class="switch-form sing-up">Регистрация</span>
                </a>
            </div>
            <div class="form-group">
                <label for="">Имя пользовтеля</label>
                <input type="text" name="login" id="login" class="data-input">
                <label for="">Пароль</label>
                <input type="password" name="password" id="password" class="data-input">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Запомнить меня</label>
                </div>
                <input class="submit" name="enter" type="button" value="Войти" id="submit"/>
                <div class="border-line"></div>
            </div>
            <div class="footer">
                <a href="{{route('recovery')}}">
                    <span class="text-muted">Забыли пароль?</span>
                </a>
            </div>
        </div>
    </div>
@endsection
{{--TODO: Привести в порядок форму сброса, подключить Toaster, добить базу городов и парков--}}
