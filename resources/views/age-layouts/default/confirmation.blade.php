@extends ('age-layouts.default')

@section('title', 'Bestellbestätigung' )

@section('main')
    <section class="fullscreen-beige-background grid-x flex-center">

        <h2 class="cell small-12">Bestellung erfolgreich bestätigt</h2>
        <div class="cell small-12 grid-x flex-center">
            <p class="cell small-12 medium-6 text-center">Sie haben die Bestellung erfolgreich bestätigt. Wir werden die Bestellung nun bearbeiten und versenden. Vielen Dank für Ihren Einkauf bei bookster.</p>
        </div>
        <a href="{{route('start')}}" class="button">Zur Startseite</a>
    </section>
@stop