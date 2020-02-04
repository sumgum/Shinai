@extends('layouts.app')

@section('content')
    <div class="p-container--form">

        <h2 class="p-container--form__title">会員登録</h2>
        <div class="p-container--form__body">
            <form action="">
                <input type="text" name="email" class="c-form" placeholder="メールアドレス">
                <input type="text" name="pass" class="c-form" placeholder="パスワード">
                <input type="text" name="pass_re" class="c-form" placeholder="パスワード再入力">
                <div class="p-container--form__btn">
                    <p><a href="" class="c-btn c-btn--twitter u-mb-40">
                        <i class="fa fa-twitter" aria-hidden="true"></i> Twitterアカウントで登録
                    </a></p>
                </div>
                <div class="p-container--form__btn u-fx u-jc">
                    <input type="submit" class="c-btn " value="登録する">
                </div>
            </form>
        </div>

    </div>
@endsection
