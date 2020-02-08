@extends('layouts.app')

@section('content')
    <div class="p-container--form">

        <h2 class="p-container--form__title">パスワードリマインダ送信</h2>
        <div class="p-container--form__body">
            <form action="">
                <input type="text" name="email" class="c-form" placeholder="メールアドレス">
                <div class="p-container--form__btn u-fx u-jc u-mb-20">
                    <input type="submit" class="c-btn " value="送信する">
                </div>

            </form>
        </div>

    </div>
@endsection
