@extends ('age-layouts.elderly')

@section('title', 'Lieferung' )

@section('main')
    <section class="grid-x flex-center beige">

        <h2 class="cell small-12 margin-bottom-small">Lieferung</h2>

        <accordion
                :title="'MEINE BESTELLUNG IST NOCH NICHT BEI MIR EINGETROFFEN'"
                :text="'Deinen voraussichtlichen Liefertermin findest du in deiner Bestätigungs-E-Mail. Bitte warte bis zu diesem Zeitpunkt darauf, dass deine Bestellung bei dir ankommt. Sollte das Paket trotz dessen immer noch nicht angekommen sein, informiere dich bitte über Meldungen des Lieferservice für deine Region, möglicherweise kommt es aufgrund von Streiks oder Unwettern zu Verzögerungen. Ansonsten kannst du mit HIlfe des Trackings deine Sendung verfolgen und den Paketdienst kontaktieren. Natürlich steht dir auch hier unser Kundenservice bei weiteren Fragen zur Seite. '"
        ></accordion>
        <accordion
                :title="'KANN ICH MEINE SENDUNG ONLINE VERFOLGEN?'"
                :text="'Wenn deine Sendung mit einem verfolgbaren Dienst verschickt worden ist, findest du in deiner Versandbestätigungs-E-Mail einen entsprechenden Link. Mit diesem kannst du den aktuellen Lieferstatus deiner Bestellung online verfolgen.'"
        ></accordion>
        <accordion
                :title="'IST MEINE BESTELLUNG SCHON AUF DEM WEG ZU MIR?'"
                :text="'Sobald deine Bestellung bei uns eingegangen ist, erhältst du eine Bestellbestätigung mit dem voraussichtlichen Lieferdatum. Wir senden dir eine weitere E-Mail, sobald deine Bestellung unser Depot verlassen hat und in den Versand gegeben wurde. Wenn deine Sendung mit einem verfolgbaren Dienst verschickt wurde, findest du in der Versandbestätigung einen Link zur Sendungsverfolgung. Bitte prüfe zunächst noch einmal das voraussichtliche Lieferdatum in deiner Bestellbestätigung, bevor du wegen einer ausstehenden Bestellung unseren Kundenservice kontaktierst.'"
        ></accordion>
        <accordion
                :title="'LIEFERT IHR AN GESCHÄFTSADRESSEN UND PACKSTATIONEN?'"
                :text="'Wir liefern an Privat- und Geschäftsadressen. Derzeit liefern wir nicht an DHL Packstationen.'"
        ></accordion>

        <a href="{{route('elderly-contact')}}" class="cell small-11 medium-8 large-6 text-center button-light margin-top-bottom margin-bottom-medium">Nicht das dabei, was du suchst? Kontaktiere unseren Kundenservice!</a>
    </section>
@stop