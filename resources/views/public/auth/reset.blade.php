@extends('components.lauthpublic')
@section('assets')
    @vite('')
@endsection
@section('content')
    <div class="content">
        <div class="form">
            <div class="change-form">
                <span class="switch-form sing-up">Сброс пароля</span>
            </div>
            <div class="form-group">
                <input type="hidden" name="hash" value="{{$hash}}" id="hash">

                <label for="">Пароль</label>
                <input name="password" id="password" type="password" class="data-input" placeholder="пароль">
                <label for="">Подтверждение пароля</label>
                <input name="confirm_password" id="confirm_password" type="password" class="data-input" placeholder="подтвердите пароль">

                <input class="submit" name="enter" type="button" value="Изменить пароль" id="reset_password"/>
                <div class="border-line"></div>
            </div>
        </div>
    </div>
@endsection
