@extends('layouts.app')

@section('content')
    <div class="p-container--form">

        <h2 class="p-container--form__title">お問い合わせ</h2>
        <div class="p-container--form__body">
            <form action="">
                <textarea class="p-container--form__textarea u-mb-20" name="" id="" cols="30" rows="10"></textarea>
                <div class="p-container--form__btn u-fx u-jc u-mb-20">
                    <input type="submit" class="c-btn " value="送信する">
                </div>

            </form>
        </div>

    </div>
@endsection
