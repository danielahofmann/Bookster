@extends ('age-layouts.seniors')

@section('title', 'Retoure' )

@section('main')
    <section class="grid-x flex-center beige">
        <div class="cell small-12 padding-top-seniors no-margin-breadcrumb">
            {{ Breadcrumbs::render('seniors-help-retoure') }}
        </div>
        <h2 class="cell small-12 margin-bottom-small">RÜCKSENDUNGEN & RÜCKERSTATTUNGEN</h2>

        <accordion
                :title="'RÜCKSENDEBESTIMMUNGEN UND WAS DU DAZU WISSEN MUSST'"
                :text="'Du kannst Artikel innerhalb von 28 Tagen nach Erhalt im Rahmen unseres Rücksenderechts kostenlos an uns zurücksenden. Das gesetzliche Widerrufsrecht unter den Verbrauchervertragsverordnungen 2013  bleibt hiervon unberührt. Falls du einen Artikel gerne umtauschen möchtest, schicke den unerwünschten Artikel bitte an uns zurück und gib eine neue Bestellung auf. Wir erstatten dir die Ware zu dem Preis, zu dem du diese erworben hast (inklusive Sale-Artikel) im Rahmen unseres Rücksenderechts. Zurückgegebene Artikel müssen sich im Originalzustand befinden und sollten im Originalzustand und in der Original-Verpackung und mit dem entsprechenden Etikett an uns zurückgesandt werden. Bitte lasse dir unbedingt einen Rücksendebeleg ausstellen und bewahre diesen auf, für den Fall, dass dein Paket unterwegs verloren gehen sollte.'"
        ></accordion>
        <accordion
                :title="'NEUE RÜCKSENDELABEL UND -FORMULARE'"
                :text="'Brauchst du ein neues Rücksendelabel? Du kannst dir direkt beim Versender auf dem DHL-Portal hier ein neues Label ausdrucken. Trage alle deine Daten sowie deine Bestellnummer als Referenz in das bereitgestellte Formular ein, das du danach bequem ausdrucken oder dir per E-Mail zuschicken kannst. Einen neuen Rücksendeschein für deine Retoure findest du im Anhang. Wichtig: Bitte fülle das Rücksendeformular aus und lege es deinem Paket bei. So stellst du sicher, dass deine Retoure in unserem Warenhaus richtig zugeordnet werden kann.'"
        ></accordion>
        <accordion
                :title="'ICH HABE EINEN FALSCHEN ARTIKEL ERHALTEN'"
                :text="'Deine ursprünglichen Liefergebühren werden dir in manchen Fällen zurückerstattet, zum Beispiel wenn deine gesamte Bestellung fehlerhaft oder inkorrekt war, oder wenn du deine Bestellung unter den Verbrauchervertragsverordnungen 2013 storniert hast.'"
        ></accordion>

        <a href="" class="cell small-11 medium-8 large-6 text-center button-light margin-top-bottom margin-bottom-medium">Nicht das dabei, was du suchst? Kontaktiere unseren Kundenservice!</a>
    </section>
@stop