@extends('components.backup.lauthpublic')
@section('assets')
    @vite('')
@endsection
@section('content')
    <div class="content">
        <div class="form">
            <div class="change-form">
                <a href="{{route('public.auth')}}">
                    <span class="switch-form sing-in ">Вход</span>
                </a>
                <a href="/registration">
                    <span class="switch-form sing-up active">Регистрация</span>
                </a>
            </div>
            <div class="form-group">
                <label for="">Имя пользовтеля</label>
                <input name="login" id="login" type="text" class="data-input" placeholder="логин">
                <label for="">Пароль</label>
                <input name="password" id="password" type="password" class="data-input" placeholder="пароль">
                <label for="">Подтверждение пароля</label>
                <input name="confirm_password" id="confirm_password" type="password" class="data-input"
                       placeholder="подтвердите пароль">

                <input class="submit" name="enter" type="button" value="Зарегистрироваться" id="registration_btn"/>
            </div>
        </div>
    </div>
@endsection
