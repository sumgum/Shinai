@component('components.head')
@endcomponent

{{-- @component('components.header')
@endcomponent --}}
    {{-- @if(session('flash_message'))
    <div class="c-flash-message">
        {{session('flash_message')}}
    </div>
    @endif --}}
    <div id="app">
        <header-component
            :authcheck = "@auth true @endauth @guest false @endauth"
            @auth
            :logout = "'{{route('logout')}}'"
            :mypage = "'{{route('mypage.show', ['id'=>Auth::user()->id])}}'"
            @endauth
        >
        </header-component>
    </div>

    @yield('flash_message')

    <main class="l-main  @yield('class', 'l-main--default')">
        @yield('content')
    </main>

@component('components.footer')
@endcomponent
