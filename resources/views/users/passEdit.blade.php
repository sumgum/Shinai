@extends('layouts.app')

@section('content')
    <div class="p-container--form">

        <h2 class="p-container--form__title">パスワード変更</h2>
        <div class="p-container--form__body">
            <form action="">
                <input type="text" name="pass_old" class="c-form" placeholder="古いパスワード">
                <input type="text" name="pass_new" class="c-form" placeholder="新しいパスワード">
                <input type="text" name="pass_new_re" class="c-form" placeholder="新しいパスワード(再入力)">
                <div class="p-container--form__btn u-fx u-jc u-mb-20">
                    <input type="submit" class="c-btn " value="変更する">
                </div>

            </form>
        </div>

    </div>
@endsection
