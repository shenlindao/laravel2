@extends('layouts.default')

@section('content')
<div class="container container__regauth">
    <div class="card card-header">
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            {{ __('Вы вошли в приложение!') }}
        </div>
    </div>
</div>
@endsection