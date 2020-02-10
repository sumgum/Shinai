@component('components.head')
@endcomponent

    <div id="app">
        <header-component
            :authcheck = "@auth true @endauth @guest false @endauth"
            @auth
            :logout = "'{{route('logout')}}'"
            :mypage = "'{{route('mypage.show', ['id'=>Auth::user()->id])}}'"
            :study = "'{{route('study.show')}}'"
            :timeline = "'{{route('timeline')}}'"
            :withdraw = "'{{route('withdraw.show')}}'"
            @endauth
            :login = "'{{route('login')}}'"
            :register = "'{{route('register')}}'"
            :top = "'{{route('top.show')}}'"
        >
        </header-component>
    </div>

    @yield('flash_message')

    <main class="l-main  @yield('class', 'l-main--default')">
        @yield('content')
    </main>

@component('components.footer')
@endcomponent
