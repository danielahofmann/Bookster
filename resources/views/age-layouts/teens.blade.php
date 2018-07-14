@extends ('layouts.master')

@section('pageTitle')
    <title>{{ config('app.name', 'Bookster') }} - @yield('title')</title>
@stop

@section('body')
    <save-age-group
            :group="'teens'"
    ></save-age-group>
    <offcanvas
            size="1"
    ></offcanvas>

    <div id="offcanvas-background" class="offcanvas-background closed"></div>
    <offcanvas-close></offcanvas-close>


    <div class="off-canvas-content" data-off-canvas-content>
        <header class="grid-x padding-top-small header clearfix">
            <hamburger-menu
                    :old-template='false'
            ></hamburger-menu>
            <search @search="search" class="display-none-tablet"></search>
            <logo
                    :old-template='false'
            ></logo>
            <div class="cell small-5 large-4">
                <div class="grid-x align-right">
                    <mobile-search @search="search"></mobile-search>
                    <wishlist
                            :path="'teens-wishlist'"
                    ></wishlist>
                    <cart
                            :path="'teens-cart'"
                    ></cart>
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

        <footer-section
                :is-toddler="false"
        ></footer-section>
    </div>
@stop