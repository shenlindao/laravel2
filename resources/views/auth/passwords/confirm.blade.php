@extends('layouts.default')

@section('content')
<div class="container container__regauth">
    <div class="card">
        <div class="card-header">{{ __('Подтвердить пароль') }}</div>

        <div class="card-body">
            {{ __('Пожалуйста, подтвердите свой пароль, прежде чем продолжить.') }}

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Пароль') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0 card__buttons">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Подтвердить пароль') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Забыли пароль?') }}
                    </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection