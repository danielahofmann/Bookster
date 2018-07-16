@extends ('age-layouts.default')

@section('title', 'Warenkorb' )

@section('main')
    <section class="fullscreen-beige-background grid-x flex-center">
        <h2 class="cell small-12">Jetzt bestellen</h2>

        <redirect-login></redirect-login>
        <redirect-registration></redirect-registration>
    </section>

@stop