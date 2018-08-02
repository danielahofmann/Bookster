    @extends ('layouts.master')

    @section('pageTitle')
        <title>{{ config('app.name', 'Bookster') }} - Bitte Alter angeben</title>
    @stop

    @section('body')
        <section class="choose-background grid-x flex-center">

            <div class="cell small-11 medium-8 container">
                <h2 class="cell small-12 text-center">Bitte Alter angeben</h2>
                <p class="cell small-12 text-center no-margin-mobile no-padding-mobile text-checkout">Für eine optimale Funktionsweise des Shops benötigen wir Ihr Alter. Halten Sie dafür den Schieberegler gedrückt und schieben diesen nach oben, bis die Ihrem Alter entsprechende Altersklasse angezeigt wird.</p>
                <age-slider class="flex-center"></age-slider>
            </div>
            <p class="question-mark">?</p>
            <opt-out></opt-out>
        </section>
    @stop