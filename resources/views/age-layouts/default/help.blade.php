@extends ('age-layouts.default')

@section('title', 'Hilfe' )

@section('main')
    <section class="fullscreen-beige-background grid-x flex-center">

        <h2 class="cell small-12 no-margin margin-bottom-small">Kundenservice</h2>
        <div class="cell small-12 medium-6 grid-x grid-margin-x flex-center">
            <div class="cell small-12 medium-6 grid-x flex-center help-box">
                <img src="/img/order.svg" alt="">
                <a href="" class="cell small-12">Probleme mit Bestellung</a>
            </div>
            <div class="cell small-12 medium-6 flex-center help-box grid-x">
                <img src="/img/delivery.svg" alt="">
                <a href="" class="cell small-12">Lieferung</a>
            </div>
            <div class="cell small-12 medium-6 flex-center help-box grid-x">
                <img src="/img/retoure.svg" alt="">
                <a href="" class="cell small-12">Rücksendung & Rückerstattung</a>
            </div>
            <div class="cell small-12 medium-6 flex-center help-box grid-x">
                <img src="/img/payment.svg" alt="">
                <a href="" class="cell small-12">Zahlung</a>
            </div>
        </div>
    </section>
@stop