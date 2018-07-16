@extends ('age-layouts.teens')

@section('title', 'Warenkorb' )

@section('main')

    <section class="fullscreen-beige-background grid-x flex-center">
        <h2 class="cell small-12">Jetzt bestellen</h2>
        <p class="cell small-12 text-checkout">Loggen Sie sich jetzt in Ihr bestehendes Konto ein, oder registrieren Sie sich als Neukunde um die Bestellung durchzuführen.</p>

        <redirect-login></redirect-login>
        <redirect-registration></redirect-registration>
    </section>

@stop