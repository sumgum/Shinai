@component('components.head')
@endcomponent

<div id="demo"></div>
<div id="app">
    <study-component
    :logout = "'{{route('logout')}}'"
    :mypage = "'{{route('mypage.show', ['id'=>Auth::user()->id])}}'"
    :study = "'{{route('study.show')}}'"
    :post = "'{{route('study.record')}}'"
    :top = "'{{route('top.show')}}'"
    :timeline = "'{{route('timeline')}}'"
    :withdraw = "'{{route('withdraw.show')}}'"
    @if(session('flash_message'))
    :flash-message = "'{{session('flash_message')}}'"
    @endif
    >
    </study-component>
</div>

@component('components.footer')
@endcomponent
