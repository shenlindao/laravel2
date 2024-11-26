@extends('layouts.default')

@section('content')
<h1>Информация о пользователях</h1>

@isset($users)
<div class="content">
    @foreach ($users as $user)
    <div class="card">
        <div class="user">
            <p>Имя: {{ $user->name }}</p>
            <p>Фамилия: {{ $user->surname }}</p>
            <p>Email: {{ $user->email }}</p>
        </div>
    </div>
    @endforeach
</div>
@endisset
@stop