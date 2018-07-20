@extends ('layouts.master')

@section('pageTitle')
    <title>{{ config('app.name', 'Bookster Admin') }} - @yield('title')</title>
@stop

@section('body')
    <header>
        <logo class="logo-padding"></logo>
    </header>

    <main>
        @yield('main')
    </main>

    <footer>
        <footer-bottom></footer-bottom>
    </footer>
@stop