<x-ladmin>
    <div class="wrapper">
        <div class="left-nav">
            <div class="logo-bar">
                <span class="logo"></span>
            </div>
            <span class="copy text-muted"> </span>
        </div>
        <div class="content">
            <div class="header">
                <div class="header-nav float-end">
                    <div class="switch">
                        <input type="checkbox" id="theme-switch"/>
                        <span class="circle large"></span>
                        <span class="circle small"></span>
                    </div>
                    <div class="element ">
                        <i class="bell"></i>
                    </div>
                    <a href="" class="profile-href">
                        <div class="profile">
                            <div class="avatar">

                            </div>
                            <div class="data">
                                <span class="name">{{$user->name}} {{$user->surname}}</span>
                                <span class="login">
                                {{$user->login}}
                                    @switch($user->role)
                                        @case(2)
                                            [Менеджер]
                                            @break
                                        @case(3)
                                            [Администратор]
                                            @break
                                    @endswitch
                            </span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="content-wrapper">
                <div class="cw-profile align-items-center">
                    <div class="cw-avatar">
                        <div class="avatar-img">

                        </div>
                    </div>
                    <div class="cw-data">
                        <span class="cw-name">{{$user->name}} {{$user->surname}}</span>
                        <span class="cw-login">{{$user->login}}</span>
                        <a href=""><span class="text-muted edit"></span></a>
                    </div>
                </div>
                <div class="user-profile">
                    <div class="up-content">
                        <div class="label">
                            <span class="text-muted">
                                Мой профиль
                            </span>
                        </div>
                        <span class="gender" id="text">
                            Пол: @switch($user->gender)
                                @case(0)
                                    Не указан
                                    @break
                                @case(1)
                                    Мужской
                                    @break
                                @case(2)
                                    Женский
                                    @break
                            @endswitch
                        </span>
                        <span class="birth" id="text">
                            Дата рождения: {{$user->date_of_birth}}, ({{$user->age}} года)
                        </span>
                        <span class="phone" id="text">
                            Телефон: {{$user->phone}}
                        </span>
                        <span class="email" id="text">
                            E-mail: {{$user->email}}
                        </span>
                        <span class="country" id="text">
                            Страна: {{$user->country}}
                        </span>
                        <span class="city" id="text">
                            Город: {{$user->city}}
                        </span>
                    </div>
                    <div class="up-content">
                        <div class="label">
                            <span class="text-muted">
                                Настройки
                            </span>
                        </div>
                        <span class="get-notification" id="text">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Не беспокоить:</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-ladmin>
