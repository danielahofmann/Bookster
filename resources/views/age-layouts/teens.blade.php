@extends ('layouts.master')

@section('pageTitle')
    <title>{{ config('app.name', 'Bookster') }} - @yield('title')</title>
@stop

@section('body')
    <save-age-group
            :group="'teens'"
            asset-character="{{ asset('storage/character-image/') }}"
            asset-product="{{ asset('storage/product-image/') }}"
            asset-author="{{ asset('storage/author-image/') }}"
    ></save-age-group>
    <offcanvas
            size="1"
            :age="'teens'"
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
                            :path="'teens-wishlist'"
                    ></wishlist>
                    <cart
                            :path="'teens-cart'"
                    ></cart>
                    <login
                            :path="'teens-login'"
                    ></login>
                </div>
            </div>

            <navigation
                    :is-active='false'
                    size="1"
                    path="teens-category"
                    class="display-none-tablet"
            ></navigation>
        </header>

        <main class="main">
            @yield('main')
        </main>

        <footer-section
                :is-toddler="false"
                :age-group="'teens'"
        ></footer-section>
    </div>
@stop