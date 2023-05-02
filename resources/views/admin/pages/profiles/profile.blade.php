@section('assets')
    @vite('resources/css/admin/pages/profile.css')
    @vite('resources/js/admin/profile.js')
@endsection
<x-ladmin>
    <x-slot name="content">
        <div class="content">
            <div class="left-section">
            <span class="content-circle-image">
                <img
                    src="@if($profile->avatar) {{url('storage/' .$profile->avatar)}} @else /assets/debug/img/testava.png @endif"
                    alt="404 Not Found" class="avatar-img">
            </span>
                <div class="content-data">
                    <span class="content-name">{{$profile->name}} {{$profile->surname}}</span>
                    <span class="content-login">{{$profile->login}}</span>
                    <input type="file" name="avatar" id="avatar" style="display: none"/>
                </div>
            </div>
            <div class="main-section">
                <div class="profile-data line">
                    <div class="label">
                    <span class="text-muted">
                        Мой профиль
                    </span>
                    </div>
                    <span class="gender">
                    Пол: @switch($profile->gender)
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
                    <span class="birth" id="profile-data" data-birth="{{$profile->date_of_birth}}">
                                Дата рождения: {{$profile->date_of_birth}} <span class="age" data-age="age"></span>
                        </span>
                    <span class="phone" id="profile-data">
                                Телефон: {{$profile->phone}}
                        </span>
                    <span class="email" id="profile-data">
                                E-mail: {{$profile->email}}
                        </span>
                    <span class="country" id="profile-data">
                                Страна: {{$profile->country}}
                        </span>
                    <span class="city" id="profile-data" contenteditable="true">
                                Город: {{$profile->city}}
                        </span>

                    <span class="form-edit text-muted">Редактировать</span>
                </div>
                <div class="settings line">
                    <div class="label">
                    <span class="text-muted">
                        Настройки
                    </span>
                    </div>
                    <span class="do-not-disturb">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Не беспокоить:</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch"
                               id="flexSwitchCheckDefault">
                    </div>
                </span>
                </div>
            </div>
        </div>
        {{--    <div class="profile-wrapper">--}}
        {{--            <div class="cw-profile align-items-center">--}}
        {{--                <div class="cw-avatar">--}}
        {{--                    <div class="avatar-img" data-id="{{$user->id}}" style="background-image: url('@if($user->avatar) {{url('storage/' .$user->avatar)}} @else /assets/debug/img/testava.png @endif')">--}}

        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="cw-data">--}}

        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="user-profile">--}}

        {{--            </div>--}}
        {{--        </div>--}}
    </x-slot>
</x-ladmin>
