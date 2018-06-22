@extends ('layouts.master')

@section('pageTitle')
    <title>{{ config('app.name', 'Bookster') }} - @yield('title')</title>
@stop

@section('body')
    <header class="grid-x padding-top-small header clearfix">
        <logo
                :old-template='true'
        ></logo>
        <div class="cell small-6 medium-4 large-4">
            <div class="grid-x align-right">
                <wishlist></wishlist>
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