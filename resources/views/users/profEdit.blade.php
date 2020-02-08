@extends('layouts.app')

@section('content')
    <div class="p-container--form">

        <h2 class="p-container--form__title">プロフィール編集</h2>
        <div class="p-container--form__body">
            <form action="{{route('profedit.update', $id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="" class="p-container--form__label">名前: 20文字以内で入力してください</label>
                <input type="text" name="user_name" class="c-form" value="@if($user_detail['user_name']){{$user_detail['user_name']}}@endif">
                <label for="" class="p-container--form__label">目標: 50文字以内で入力してください</label>
                <input type="text" name="user_target" class="c-form" value="@if($user_detail['user_target']){{$user_detail['user_target']}}@endif">
                <div class="p-container--form__img u-mb-40">
                    @if($user_detail['prof_image'])
                    <p><img class="c-img--m" src="{{asset($user_detail['prof_image'])}}" alt=""  class="c-img--m"></p>
                    @else
                    <div class="p-img-container">
                        <p class="p-img-container__text">未設定</p>
                    </div>
                    @endif
                    <p><i class="fa fa-arrow-right" aria-hidden="true"></i></p>
                    <div class="p-img-drop-container">
                        <label class="js-area-drop">
                            <input type="file" name="prof_image" class="p-img-drop-container__input-file js-input-file">
                            <img src="" alt="" class="p-img-drop-container__img js-img">
                            <div class="p-img-drop-container__text-container">
                                <p>ドラッグ</p>
                                <p>＆</p>
                                <p>ドロップ</p>
                            </div>
                        </label>
                    </div>

                </div>
                <div class="p-container--form__btn u-fx u-jc">
                    <input type="submit" class="c-btn " value="変更を保存する">
                </div>
            </form>
        </div>

    </div>
@endsection
