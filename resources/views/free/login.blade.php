@extends('layouts.app')

@section('content')
    <div class="p-container--form">

        <h2 class="p-container--form__title">ログイン</h2>
        <div class="p-container--form__body">
            <form action="">
                <input type="text" name="email" class="c-form" placeholder="メールアドレス">
                <input type="text" name="pass" class="c-form" placeholder="パスワード">
                {{-- <div class="p-container--form__btn">
                    <p><a href="" class="c-btn c-btn--twitter u-mb-20">
                        <i class="fa fa-twitter" aria-hidden="true"></i> Twitterアカウントでログイン
                    </a></p>
                </div> --}}
                <label for="" class="u-mb-20 u-b"><input type="checkbox" name="pass_save"> 次回ログインを省略する</label>
                <p class="u-mb-20">パスワードを忘れた方は<a href="">こちら</a></p>
                <div class="p-container--form__btn u-fx u-jc u-mb-20">
                    <input type="submit" class="c-btn " value="ログイン">
                </div>

            </form>
        </div>

    </div>
@endsection
