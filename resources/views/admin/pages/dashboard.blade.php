<x-ladmin>
    <div class="wrapper">
        <div class="left-nav">
            <div class="logo-bar">
                <span class="logo"></span>
            </div>
            <span class="copy">2023 &copy Все права защищены.</span>
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
                    <a href="{{route('profile')}}" class="profile-href">
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

            </div>
        </div>
    </div>
</x-ladmin>
