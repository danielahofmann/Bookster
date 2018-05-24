@extends ('layouts.master')

@section('pageTitle')
    <title>{{ config('app.name', 'Bookster') }} - @yield('title')</title>
@stop

@section('body')
    <header class="grid-x grid-margin-x">
        <search @search="search"></search>
        <logo></logo>
        <div class="cell large-3">
            <login></login>
        </div>

    </header>

    <main>
        @yield('main')
    </main>

    <footer>
        <h5>footer</h5>
    </footer>
@stop