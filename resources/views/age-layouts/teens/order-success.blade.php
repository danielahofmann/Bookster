@extends ('age-layouts.teens')

@section('title', 'Bestellung aufgegeben' )

@section('main')
    <section class="fullscreen-beige-background grid-x flex-center">

        <h2 class="cell small-12">Bestellung wurde gespeichert</h2>
        <div class="cell small-12 grid-x flex-center">
            <p class="cell small-12 medium-6 text-center">Ihre Bestellung ist nun bei uns eingegangen und die Bestätigungs-Mail wurde an Ihren Erziehungsberechtigten versandt. Nach Bestätigung der E-Mail versenden wir Ihre Ware. Sollten Sie bis dahin Fragen haben, können SIe sich gerne jederzeit an unseren Kundenservice wenden.</p>
        </div>
        <a href="{{route('teens-home')}}" class="button">Zur Startseite</a>
    </section>
@endsection
