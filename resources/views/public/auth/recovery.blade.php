@extends('components.lauthpublic')
@section('assets')
    @vite('')
@endsection
@section('content')
    <div class="content">
        <div class="form">
            <div class="form-group">
                <label for="">E-mail</label>
                <input type="text" name="email" id="email" class="data-input">
                <input class="submit" name="enter" type="button" value="Сбросить пароль" id="recovery_btn"/>
                <div class="border-line"></div>
            </div>
            <div class="footer">
                <a href="{{route('public.auth')}}">
                    <span class="text-muted">Авторизация</span>
                </a>
            </div>
        </div>
    </div>
@endsection
