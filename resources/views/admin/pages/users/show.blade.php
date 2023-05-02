@section('assets')
    @vite('resources/css/admin/pages/users.css')
@endsection
<x-ladmin>
    <x-slot name="content">
        <div class="content">
            <table class="db-Table">
                <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>Аватар</th>
                    <th>Логин</th>
                    <th>E-mail, Подтверждение</th>
                    <th>Имя, Фамилия</th>
                    <th>Пол</th>
                    <th>Дата рождения</th>
                    <th>Номер телефона</th>
                    <th>Страна, Город</th>
                    <th>Дата создания</th>
                    <th>Дата обновления</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td></td>
                        <td>{{$user->id}}</td>
                        <td class="td-image">
                        <span class="table-circle-image role"
                              @switch($user->role)
                                  @case(1) style="border-color: #ffffff"
                              @case(2) style="border-color: #0003ff"
                              @case(3) style="border-color: #ff5454"
                              @endswitch>
                            <img
                                src="@if($user->avatar) {{url('storage/' .$user->avatar)}} @else /assets/debug/img/testava.png @endif"
                                alt="404 Not Found" class="avatar-img">
                        </span>
                        </td>
                        <td>{{$user->login}}</td>
                        <td>{{$user->email}},

                        </td>
                        <td>{{$user->name}} {{$user->surname}}</td>
                        <td>
                            @switch($user->gender)
                                @case(0)-
                                @break
                                @case(1)М
                                @break
                                @case(2)Ж
                                @break
                            @endswitch
                        </td>
                        <td>{{$user->date_of_birth}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->country}}, {{$user->city}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td>
                            <a href="" class="edit-btn btn-space">Редактировать</a>
                            <a href="" class="del-btn btn-space">Удалить</a>
                            <a href="" class="enter-btn btn-space">Войти</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </x-slot>
</x-ladmin>
