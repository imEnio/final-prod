<x-lauthadmin>
    <div class="wrapper">
        <div class="auth-form">
            <span class="logo">POCKETWORLD</span>
            <div class="auth-content text-center" id="auth-content">
                <div class="log-in-box">
                    <span class="log-in">Авторизация</span>
                </div>
                <form>
                    <div class="form-group">
                        <input name="login" id="login" type="text" class="form-style" placeholder="логин">
                        <i class="user-icon icon"></i>
                    </div>
                    <div class="form-group">
                        <input name="password" id="password" type="password" class="form-style" placeholder="пароль">
                        <i class="password-icon icon"></i>
                    </div>
                    <div class="remember-reset">
                        <div>
                            <input type="checkbox" name="remember" id="remember">
                            <span class="rr-text">Запомнить меня</span>
                        </div>
                        <span class="rr-text">
                            <a href="" class="text-decoration-none text-reset">
                                Забыли пароль?
                            </a>
                        </span>
                    </div>
                    <input class="submit" name="enter" type="button" value="Войти" id="submit"/>
                </form>
                <div class="password-alert">
                    <div class="alert" role="alert">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-lauthadmin>
