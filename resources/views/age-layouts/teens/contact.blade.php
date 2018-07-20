@extends ('age-layouts.teens')

@section('title', 'Kontakt' )

@section('main')
    <section class="grid-x contact">
        <img src="/img/contact.png" alt="Kontakt" class="cell small-12 medium-6">

        <div class="cell small-12 medium-6 flex-center">
            <div>
                <h3>Besuch den Hilfebereich</h3>
                <p class="text-center contact-text">Hast du noch Fragen zu deiner Bestellung? In unserem Hilfebereich
                    findest du Antworten auf die häufigsten
                    Fragen!</p>
                <a href="{{route('default-help')}}" class="button button-outline-blue margin-left">Zum Hilfebereich</a>

                <h3>Oder kontaktiere uns einfach!</h3>
                <p class="text-center contact-text">Bei speziellen Fragen zu deiner Bestellung oder Retoure, kontaktiere
                    einfach unseren Kundenservice.
                    Unsere Mitarbeiter sind werktags immer von 8 bis 20 Uhr erreichbar.</p>
                <p class="text-center contact-text">Tel.: 0111 11 11 11</p>
            </div>
        </div>
    </section>
@stop