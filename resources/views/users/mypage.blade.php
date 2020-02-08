@extends('layouts.app')

@section('flash_message')
    @if(session('flash_message'))
    <div class="c-flash-msg c-flash-msg--success js-flash">
        {{session('flash_message')}}
    </div>
    @endif
@endsection

@section('content')
<div class="p-container--mypage">
    <div class="p-container--result">

        <div class="p-container--result__body">
            <h2 class="p-container--result__title">学習時間</h2>
            <div class="p-container--result__body__content">
                @component('components.studyTime')
                    @slot('time_title')
                    今日
                    @endslot
                    @slot('study_time')
                    {{$today_study}}
                    @endslot
                    @slot('rest_time')
                    {{$today_rest}}
                    @endslot
                    @slot('etc_time')
                    {{$today_etc}}
                    @endslot
                @endcomponent
                @component('components.studyTime')
                    @slot('time_title')
                    今週
                    @endslot
                    @slot('study_time')
                    {{$this_week_study}}
                    @endslot
                    @slot('rest_time')
                    {{$this_week_rest}}
                    @endslot
                    @slot('etc_time')
                    {{$this_week_etc}}
                    @endslot
                @endcomponent
                @component('components.studyTime')
                    @slot('time_title')
                    今月
                    @endslot
                    @slot('study_time')
                    {{$this_month_study}}
                    @endslot
                    @slot('rest_time')
                    {{$this_month_rest}}
                    @endslot
                    @slot('etc_time')
                    {{$this_month_etc}}
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>

    <div class="p-container--mypage__sidebar">
        <div class="p-container--prof">
            <h2 class="p-container--prof__title">プロフィール</h2>
            <div class="p-container--prof__body">
            @if(!empty($user_details['prof_image']))
            <img src="{{asset($user_details['prof_image'])}}" alt="" class="p-container--prof__body__img">
            @else
            <img src="{{asset('storage/image/sample/sample.jpeg')}}" alt="" class="p-container--prof__body__img">
            @endif
                <div class="p-container--prof__body__txt">
                    <p>名前：{{$user_details['user_name']}}</p>
                    <p>目標：{{$user_details['user_target']}}</p>
                </div>

                @if($id == Auth::user()->id)
                <p class="p-container--prof__body__btn"><a href="{{route('profedit.show', ['id'=>Auth::user()->id])}}" class="c-btn">編集</a></p>
                @endif
            </div>
        </div>

        @if($id == Auth::user()->id)
        <div class="p-container--config">
            <p><a class="p-container--config__element" href="{{route('profedit.show', ['id'=>Auth::user()->id])}}">プロフィール編集</a></p>
            {{-- <p><a class="p-container--config__element" href="/password/reset/{{Auth::user()->id}}">パスワード変更</a></p> --}}
            <p><a class="p-container--config__element" href="/password/reset">パスワード変更</a></p>
            <p><a class="p-container--config__element" href="{{route('withdraw.show')}}">退会</a></p>
        </div>
        @endif
    </div>
</div>
@endsection
