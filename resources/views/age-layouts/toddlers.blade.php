@extends ('layouts.master')

@section('pageTitle')
    <title>{{ config('app.name', 'Bookster') }} - @yield('title')</title>
@stop

@section('body')
    <save-age-group
        :group="'toddlers'"
        asset-character="{{ asset('storage/character-image/') }}"
        asset-product="{{ asset('storage/product-image/') }}"
        asset-author="{{ asset('storage/author-image/') }}"
    ></save-age-group>
    <header class="grid-x padding-top-small header clearfix">
        <mobile-logo></mobile-logo>
        <toddler-redirect
                resource="{{ route('redirect') }}"
        ></toddler-redirect>
        <logo
                :old-template='true'
        ></logo>
        <div class="cell small-6 medium-4 large-4">
            <div class="grid-x align-right">
                <toddler-wishlist></toddler-wishlist>
            </div>
        </div>
    </header>

    <main class="main">
        @yield('main')
    </main>

    <footer-section
            :is-toddler="true"
    ></footer-section>
    </div>
@stop