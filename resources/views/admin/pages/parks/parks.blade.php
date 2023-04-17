@extends('components.ladmin')
@section('assets')
    @vite('resources/css/admin/pages/profile.css')
    @vite('resources/js/admin/profile.js')
@endsection
@section('content')
    <div class="content">
        <table class="db-Table">
            <thead>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Город</th>
                <th>Название</th>
                <th>Лого</th>
                <th>Описание</th>
                <th>Адресс, Метро</th>
                <th>Номер телефона</th>
                <th>Сайт</th>
                <th>Площадь</th>
                <th>График работы</th>
                <th>Средний чек</th>
                <th>Дата создания</th>
                <th>Дата обновления</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($parks as $park)
                <tr>
                    <td></td>
                    <td>{{$park->id}}</td>
                    <td>{{$park->city->city}}</td>
                    <td>{{$park->title}}</td>
                    <td>{{$park->logo}}</td>
                    <td>{{$park->description}}</td>
                    <td>{{$park->address}} {{$park->subway}}</td>
                    <td>{{$park->phone}}</td>
                    <td>{{$park->web}}</td>
                    <td>{{$park->square}}</td>
                    <td>{{$park->time_zone}}</td>
                    <td>{{$park->avg_price}}</td>
                    <td>{{$park->created_at}}</td>
                    <td>{{$park->updated_at}}</td>
                    <td>
                        <a href="" class="edit-btn btn-space">Редактировать</a>
                        <a href="" class="del-btn btn-space">Удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
