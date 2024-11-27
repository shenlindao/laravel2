@extends('layouts.default')

@section('content')

<h1>Добавить пользователя</h1>
<div class="content">
    <form action="store-user" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="surname">Фамилия</label>
            <input type="text" id="surname" name="surname" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>

@stop