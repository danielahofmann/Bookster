@extends ('age-layouts.elderly')

@section('title', 'Hilfe Bestellung' )

@section('main')
    <section class="grid-x flex-center beige">

        <h2 class="cell small-12 margin-bottom-small">Probleme mit der Bestellung</h2>

        <accordion
            :title="'IN MEINER BESTELLUNG FEHLEN EIN ODER MEHRERE ARTIKEL'"
            :text="'Es kann vorkommen, dass wir nicht alle Artikel einer Bestellung in einem Paket schicken. Sieh deshalb bitte zunächst in deiner Versandbestätigungs-E-Mail nach, ob alle deine bestellten Artikel darin aufgeführt sind, oder ob einige Artikel separat geliefert werden. Wenn deine Bestellung in mehreren Paketen geliefert wird, sind auf dem Lieferschein nur die in diesem Paket enthaltenen Artikel aufgelistet. Überprüfe bitte den Lieferschein jeder einzelnen Teillieferung, um sicherzugehen, dass nichts vergessen wurde. Sollte dennoch einmal ein Artikel aus deiner Bestellung fehlen, kontaktiere bitte unser Kundenservice-Team.'"
        ></accordion>
        <accordion
                :title="'ICH HABE EINEN FEHLERHAFTEN ARTIKEL ERHALTEN'"
                :text="'Wir möchten, dass alle unsere Kunden qualitativ hochwertige Produkte erhalten. Falls du doch einmal einen fehlerhaften Artikel erhalten hast, tut uns dies leid. Bitte wende dich in diesem Fall an unser Kundenservice-Team und teile uns deine Bestellnummer, Artikelnamen, Produktcode sowie eine kurze Beschreibung des Fehlers mit.'"
        ></accordion>
        <accordion
                :title="'ICH HABE EINEN FALSCHEN ARTIKEL ERHALTEN'"
                :text="'Es tut uns sehr leid, wenn uns beim Packen deiner Bestellung ein Fehler unterlaufen ist und du versehentlich einen falschen Artikel erhalten hast. Bitte wende dich hier an unser Kundenservice-Team und gib uns deine Bestellnummer an, welchen Artikel du eigentlich erhalten haben solltest und welchen Artikel du stattdessen erhalten hast.'"
        ></accordion>
        <accordion
                :title="'IST ES MÖGLICH, MEINE BESTELLUNG NOCH ZU ÄNDERN?'"
                :text="'Leider ist es nicht möglich, bereits aufgegebene Bestellungen zu ändern. Wir können weder die Größe oder Farbe eines Artikels, noch die Lieferadresse oder Zahlungsart ändern, noch Artikel hinzufügen oder entfernen.'"
        ></accordion>

        <a href="" class="cell small-11 medium-8 large-6 text-center button-light margin-top-bottom margin-bottom-medium">Nicht das dabei, was du suchst? Kontaktiere unseren Kundenservice!</a>
    </section>
@stop