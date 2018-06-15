@extends ('layouts.master')

@section('pageTitle')
    <title>{{ config('app.name', 'Bookster') }} - @yield('title')</title>
@stop

@section('body')
    <offcanvas></offcanvas>

    <header class="grid-x padding-top-small header clearfix">
        <hamburger-menu></hamburger-menu>
        <search @search="search" class="display-none-tablet"></search>
        <logo></logo>
        <div class="cell small-5 large-4">
            <div class="grid-x align-right">
                <mobile-search @search="search"></mobile-search>
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

    <main class="main" class="off-canvas-content" data-off-canvas-content>
        @yield('main')
    </main>

    <footer-section></footer-section>
@stop