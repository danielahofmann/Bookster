@extends ('layouts.master')

@section('pageTitle')
    <title>{{ config('app.name', 'Bookster') }} - @yield('title')</title>
@stop

@section('body')
    <header class="grid-x padding-top-small header clearfix">
        <search @search="search"></search>
        <logo></logo>
        <div class="cell large-4">
            <div class="grid-x align-right">
                <wishlist></wishlist>
                <cart></cart>
                <login></login>
            </div>
        </div>

        <navigation
            :is-active='false'
            size="1"
        ></navigation>
    </header>

    <main style="margin-top:110px">
        @yield('main')
    </main>

    <footer>
        <h5>footer</h5>
    </footer>
@stop