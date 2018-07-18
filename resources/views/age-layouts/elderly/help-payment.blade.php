@extends ('age-layouts.elderly')

@section('title', 'Hilfe Zahlung' )

@section('main')
    <section class="grid-x flex-center beige">

        <h2 class="cell small-12 margin-bottom-small">Zahlung</h2>

        <accordion
                :title="'Welche Zahlungsmethoden stehen zur Verfügung?'"
                :text="'In unserem Onlineshop stehen dir die Zahlungsmethoden Rechnung, Vorkasse und Nachname zur Verfügung.'"
        ></accordion>
        <accordion
                :title="'Bietet ihr einen Studentenrabatt an?'"
                :text="'Zur Zeit bieten wir leider keine Rabatte für Studenten an. Jedoch haben wir immer wieder Rabattaktionen, auf die wir zuvor über unsere Website aufmerksam machen.'"
        ></accordion>

        <a href="" class="cell small-11 medium-8 large-6 text-center button-light margin-top-bottom margin-bottom-medium">Nicht das dabei, was du suchst? Kontaktiere unseren Kundenservice!</a>
    </section>
@stop