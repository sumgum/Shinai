@extends('layouts.app')

@section('content')
<div class="p-container--form">

    <h2 class="p-container--form__title">パスワードリセット</h2>
    <div class="p-container--form__body">
        <form action="{{route('password.update')}}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <input id="email" type="email" class="c-form @error('email') c-form--error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">

            @error('email')
                <span class="c-form__msg--error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input id="password" type="password" class="c-form @error('password') c-form--error @enderror" name="password" required autocomplete="current-password" placeholder="新しいパスワード">

            @error('password')
                <span class="c-form__msg--error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input id="password-confirm" type="password" class="c-form @error('password-confirm') c-form--error @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="新しいパスワード(再入力)">

            @error('password-confirm')
                <span class="c-form__msg--error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror


            <div class="p-container--form__btn u-fx u-jc u-mb-20">
                <input type="submit" class="c-btn " value="変更する">
            </div>

        </form>
    </div>

</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
