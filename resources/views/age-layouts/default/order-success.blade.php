@extends ('age-layouts.default')

@section('title', 'Bestellung erfolgreich' )

@section('main')
    <section class="fullscreen-beige-background grid-x flex-center">

        <h2 class="cell small-12">Bestellung erfolgreich</h2>
        <div class="cell small-12 grid-x flex-center">
            <p class="cell small-12 medium-6 text-center">Ihre Bestellung ist nun bei uns eingegangen und wird schnellstens von uns bearbeitet. Vielen Dank für Ihren Einkauf bei bookster.</p>
        </div>
        <a href="{{route('default-home')}}" class="button">Zur Startseite</a>
    </section>
@endsection
