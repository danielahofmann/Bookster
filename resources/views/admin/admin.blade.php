@extends ('layouts.master')

@section('pageTitle')
    <title>{{ config('app.name', 'Bookster Admin') }} - @yield('title')</title>
@stop

@section('body')
    <header>
        <logo class="logo-padding"></logo>
    </header>

    <main>
        @if(session('status'))
            <alert-popup
                    status="{{session('status')}}"
            ></alert-popup>
        @endif

        @yield('main')
    </main>

    <footer>
        <footer-bottom
            :age="'admin'"
        ></footer-bottom>
    </footer>
@stop