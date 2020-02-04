@extends('layouts.app')

@section('content')
    <div class="p-container--form">

        <h2 class="p-container--form__title">退会</h2>
        <div class="p-container--form__body">
            <form action="{{route('withdraw.withdraw')}}" method="POST">
                @csrf
                <div class="p-container--form__btn u-fx u-jc u-mb-20">
                    <input type="submit" class="c-btn " value="退会する">
                </div>
            </form>
        </div>

    </div>
@endsection
