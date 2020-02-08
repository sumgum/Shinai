@extends('layouts.app')

@section('content')
<div class="p-container--form">

    <h2 class="p-container--form__title">ログイン</h2>
    <div class="p-container--form__body">
        <form action="{{route('login')}}" method="POST">
            @csrf
            @error('email')
                <span class="c-form__msg--error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input id="email" type="email" class="c-form @error('email') c-form--error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">

            @error('password')
                <span class="c-form__msg--error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <input id="password" type="password" class="c-form @error('password') c-form--error @enderror" name="password" required autocomplete="current-password" placeholder="パスワード">


            <label for="" class="u-mb-20 u-b"><input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> 次回ログインを省略する</label>

            @if(Route::has('password.request'))
                <p class="u-mb-20">パスワードを忘れた方は<a href="{{route('password.request')}}">こちら</a></p>
            @endif
            <div class="p-container--form__btn u-fx u-jc u-mb-20">
                <input type="submit" class="c-btn " value="ログイン">
            </div>

        </form>
    </div>

</div>

@endsection
