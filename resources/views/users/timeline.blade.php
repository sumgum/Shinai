@component('components.head')
@endcomponent

<div id="demo"></div>
<div id="app">
    <header-component
        :authcheck = "@auth true @endauth @guest false @endauth"
        :logout = "'{{route('logout')}}'"
        :mypage = "'{{route('mypage.show', ['id'=>Auth::user()->id])}}'"
    >
    </header-component>

    @if(session('warn_message'))
    <div class="c-flash-msg c-flash-msg--warn js-flash">
        {{session('warn_message')}}
    </div>
    @endif

    <timeline-component
        :study-records="{{$study_records}}"
        :auth_id="{{Auth::user()->id}}">
    </timeline-component>
</div>

@component('components.footer')
@endcomponent
