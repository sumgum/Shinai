@component('components.head')
@endcomponent

<div id="demo"></div>
<div id="app">
    {{-- <header-component
        :authcheck = "@auth true @endauth @guest false @endauth"
        :logout = "'{{route('logout')}}'"
    >
    </header-component> --}}
    <study-component
    :logout = "'{{route('logout')}}'"
    :mypage = "'{{route('mypage.show', ['id'=>Auth::user()->id])}}'"
    >
</study-component>
</div>

@component('components.footer')
@endcomponent
