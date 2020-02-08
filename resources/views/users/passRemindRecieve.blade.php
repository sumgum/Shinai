@extends('layouts.app')

@section('content')
    <div class="p-container--form">

        <h2 class="p-container--form__title">パスワードリマインダ入力</h2>
        <div class="p-container--form__body">
            <form action="">
                <input type="text" name="remind_code" class="c-form" placeholder="発行コード">
                <div class="p-container--form__btn u-fx u-jc u-mb-20">
                    <p class="u-mr-20"><a href="" class="c-btn">コード再発行</a></p>
                    <input type="submit" class="c-btn " value="変更する">
                </div>

            </form>
        </div>

    </div>
@endsection
