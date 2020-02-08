@extends('layouts.app')

@section('content')
<div class="p-container--form">

    <h2 class="p-container--form__title">会員登録</h2>
    <div class="p-container--form__body">
        <form action="{{route('register')}}" method="POST">
            @csrf

            <input id="email" type="email" class="c-form @error('email') c-form--error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="メールアドレス">

            @error('email')
                <span class="c-form__msg--error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input id="password" type="password" class="c-form @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="パスワード">

            @error('password')
                <span class="c-form__msg--error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input id="password-confirm" type="password" class="c-form" name="password_confirmation" required autocomplete="new-password" placeholder="パスワード再入力">

            <div class="p-container--form__btn u-fx u-jc">
                <input type="submit" class="c-btn " value="登録する">
            </div>
        </form>
    </div>

</div>
@endsection
