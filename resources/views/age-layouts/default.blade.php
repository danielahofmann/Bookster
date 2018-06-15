@extends ('layouts.master')

@section('pageTitle')
    <title>{{ config('app.name', 'Bookster') }} - @yield('title')</title>
@stop

@section('body')
    <header class="grid-x padding-top-small header clearfix">
        <search @search="search" class="display-none-tablet"></search>
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
            class="display-none-tablet"
        ></navigation>
    </header>

    <main class="main">
        @yield('main')
    </main>

    <footer-section></footer-section>
@stop