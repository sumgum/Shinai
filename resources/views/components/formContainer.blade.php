
<form action="" method="post" class="c-form">
    @csrf
    <div class="c-form__header">@yield('title')</div>
    <div class="c-form__body">
        @yield('content')
    </div>
</form>
