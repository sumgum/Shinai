@extends('layouts.app')

@section('class', 'l-main--top')
@section('content')
    <div class="p-container--top">
        <div class="p-container--top__demo">
            <div id="demo">
                <study-demo-component></study-demo-component>
            </div>
        </div>
        <div class="p-content--top__text">
            <div class="p-container--top__body">
                <div class="p-container--top__title">『しない』<br class="u-display--md">を記録しよう</div>
                <div class="p-container--top__body__element">
                    <p><i class="c-btn--rest c-btn--rest--off">しない</i>を押して<br class="u-display--md">積極的にサボろう！</p>
                    <p>しないをやめるときは</p>
                    <p><i class="c-btn--rest c-btn--rest--on">しない</i>をもう一度おしてね！</p>
                </div>
            </div>
            <ul class="p-container--top__bottom">
                <li class="u-ib"><a href="{{route('register')}}" class="c-btn">会員登録</a></li>
                <li class="u-ib"><a href="{{route('login')}}" class="c-btn">ログイン</a></li>
            </ul>
        </div>
    </div>
@endsection
