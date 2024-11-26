@extends('layouts.default')

@section('content')
<h1>Информация о пользователях</h1>

@isset($user)
<div class="content">
    <div class="card">
        <p>Имя: {{ $user->name }}</p>
        <p>Фамилия: {{ $user->surname }}</p>
        <p>Email: {{ $user->email }}</p>
    </div>
</div>
@endisset
@stop
