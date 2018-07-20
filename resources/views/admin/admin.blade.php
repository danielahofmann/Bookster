@extends ('layouts.master')

@section('pageTitle')
    <title>{{ config('app.name', 'Bookster Admin') }} - @yield('title')</title>
@stop

@section('body')
    <header>
        
    </header>

    <main class="main">
        @yield('main')
    </main>

    <footer>
        <footer-bottom></footer-bottom>
    </footer>
@stop