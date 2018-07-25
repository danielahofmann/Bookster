@extends ('layouts.master')

@section('pageTitle')
    <title>{{ config('app.name', 'Bookster') }} - @yield('title')</title>
@stop

@section('body')
    <save-age-group
            :group="'default'"
    ></save-age-group>
    <offcanvas
        size="1"
        :age="'default'"
    ></offcanvas>

    <div id="offcanvas-background" class="offcanvas-background closed"></div>
    <offcanvas-close></offcanvas-close>


    <div class="off-canvas-content" data-off-canvas-content>
        <header class="grid-x padding-top-small header clearfix">
            <hamburger-menu
                    :old-template='false'
            ></hamburger-menu>
            <search class="display-none-tablet"
                    token="{!! csrf_token() !!}"
            ></search>
            <logo
                    :old-template='false'
            ></logo>
            <div class="cell small-5 large-4">
                <div class="grid-x align-right">
                    <mobile-search
                            token="{!! csrf_token() !!}"
                    ></mobile-search>
                    <wishlist
                        :path="'default-wishlist'"
                    ></wishlist>
                    <cart
                            :path="'default-cart'"
                    ></cart>
                    <login
                        :path="'default-login'"
                    ></login>
                </div>
            </div>

            <navigation
                    :is-active='false'
                    size="1"
                    path="default-category"
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