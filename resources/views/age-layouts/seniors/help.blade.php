@extends ('age-layouts.seniors')

@section('title', 'Hilfe' )

@section('main')
    <section class="fullscreen-beige-background grid-x flex-center padding-top-seniors">
        <h2 class="cell small-12 no-margin margin-bottom-medium">Kundenservice</h2>
        <div class="cell small-12 medium-10 large-6 grid-x grid-margin-x flex-center">
            <div class="cell small-12 medium-6 grid-x flex-center help-box">
                <a href="{{route('seniors-help-order')}}">
                    <img src="/img/order.svg" alt="Probleme mit Bestellung">
                    <a href="{{route('seniors-help-order')}}" class="cell small-12">Probleme mit Bestellung</a>
                </a>
            </div>
            <div class="cell small-12 medium-6 flex-center help-box grid-x">
                <a href="{{route('seniors-help-delivery')}}">
                    <img src="/img/delivery.svg" alt="Lieferung">
                    <a href="{{route('seniors-help-delivery')}}" class="cell small-12">Lieferung</a>
                </a>
            </div>
            <div class="cell small-12 medium-6 flex-center help-box grid-x">
                <a href="{{route('seniors-help-retoure')}}">
                    <img src="/img/retoure.svg" alt="Rücksendung & Rückerstattung">
                    <a href="{{route('seniors-help-retoure')}}" class="cell small-12">Rücksendung & Rückerstattung</a>
                </a>
            </div>
            <div class="cell small-12 medium-6 flex-center help-box grid-x">
                <a href="{{route('seniors-help-payment')}}">
                    <img src="/img/payment.svg" alt="Zahlung">
                    <a href="{{route('seniors-help-payment')}}" class="cell small-12">Zahlung</a>
                </a>
            </div>
        </div>
    </section>
@stop