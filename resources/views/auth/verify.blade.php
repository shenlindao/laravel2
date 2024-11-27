@extends('layouts.default')

@section('content')
<div class="container container__regauth">
    <div class="card">
        <div class="card-header">{{ __('Подтвердите свой адрес электронной почты') }}</div>

        <div class="card-body">
            @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('На ваш электронный адрес была отправлена новая ссылка для подтверждения.') }}
            </div>
            @endif

            {{ __('Прежде чем продолжить, пожалуйста, проверьте свою электронную почту на наличие ссылки для подтверждения.') }}
            {{ __('Если вы не получили электронное письмо') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('нажмите здесь, чтобы запросить еще одно') }}</button>.
            </form>
        </div>
    </div>
</div>
@endsection