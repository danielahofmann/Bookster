@extends ('layouts.master')

@section('pageTitle')
    <title>{{ config('app.name', 'Bookster') }} - @yield('title')</title>
@stop

@section('body')
    <save-age-group
            :group="'seniors'"
    ></save-age-group>
    <offcanvas
            size="1.25"
    ></offcanvas>

    <div id="offcanvas-background" class="offcanvas-background closed"></div>
    <offcanvas-close></offcanvas-close>

    <div class="off-canvas-content" data-off-canvas-content>
        <header class="grid-x padding-top-small header clearfix">
            <mobile-logo></mobile-logo>
            <hamburger-menu
                    :old-template='true'
            ></hamburger-menu>
            <search @search="search" class="display-none-tablet"></search>
            <logo
                    :old-template='true'
            ></logo>
            <div class="cell small-6 medium-4 large-4">
                <div class="grid-x align-right">
                    <mobile-search @search="search"></mobile-search>
                    <wishlist></wishlist>
                    <cart></cart>
                    <login></login>
                </div>
            </div>

            <navigation
                    :is-active='true'
                    size="1.25"
                    class="display-none-tablet"
            ></navigation>
        </header>

        <main class="main">
            @yield('main')
        </main>

        <footer-section
                :is-toddler="false"
        ></footer-section>
    </div>
@stop