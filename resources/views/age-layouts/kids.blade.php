@extends ('layouts.master')

@section('pageTitle')
    <title>{{ config('app.name', 'Bookster') }} - @yield('title')</title>
@stop

@section('body')
    <save-age-group
            :group="'kids'"
            asset-character="{{ asset('storage/character-image/') }}"
            asset-product="{{ asset('storage/product-image/') }}"
            asset-author="{{ asset('storage/author-image/') }}"
    ></save-age-group>
    <offcanvas
            size="1.25"
            :age="'kids'"
            :kids="true"
    ></offcanvas>

    <div id="offcanvas-background" class="offcanvas-background closed"></div>
    <offcanvas-close></offcanvas-close>

    <div class="off-canvas-content" data-off-canvas-content>
        <header class="grid-x padding-top-small header clearfix">
            <mobile-logo></mobile-logo>
            <hamburger-menu
                    :old-template='true'
            ></hamburger-menu>
            <search class="display-none-tablet"
                    token="{!! csrf_token() !!}"
            ></search>
            <logo
                    :old-template='true'
            ></logo>
            <div class="cell small-6 medium-4 large-4">
                <div class="grid-x align-right">
                    <wishlist
                            :path="'kids-wishlist'"
                    ></wishlist>
                    <mobile-search
                            token="{!! csrf_token() !!}"
                            :kids-view="true"
                    ></mobile-search>
                </div>
            </div>

            <navigation
                    :is-active='true'
                    size="1.25"
                    path="kids-category"
                    class="display-none-tablet"
                    :hide="true"
            ></navigation>
        </header>

        <main class="main">
            @if(session('status'))
                <alert-popup
                        status="{{session('status')}}"
                ></alert-popup>
            @endif

            @yield('main')
        </main>

        <footer-section
            :is-toddler="false"
            :is-kids="true"
            :age-group="'kids'"
        ></footer-section>
    </div>
@stop