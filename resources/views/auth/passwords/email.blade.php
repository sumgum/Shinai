@extends('layouts.app')

@section('flash_message')
    @if(session('status'))
    <div class="c-flash-msg c-flash-msg--success js-flash">
        {{session('status')}}
    </div>
    @endif
@endsection


@section('content')
<div class="p-container--form">

    <h2 class="p-container--form__title">パスワードリセット</h2>
    <div class="p-container--form__body">
        <form action="{{route('password.email')}}" method="POST">
            @csrf
            <input id="email" type="email" class="c-form @error('email') c-form--error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="メールアドレス">

            @error('email')
                <span class="c-form__msg--error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="p-container--form__btn u-fx u-jc">
                <input type="submit" class="c-btn " value="変更メール送信">
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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
