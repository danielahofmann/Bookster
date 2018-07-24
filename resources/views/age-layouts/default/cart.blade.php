@extends ('age-layouts.default')

@section('title', 'Warenkorb' )

@section('main')

    @if(!empty($products))
            <section class="grid-x grid-margin-x background-beige padding-bottom-large cart-section flex-center-mobile">
                <h2 class="cell small-12 display-mobile-none">Meine Tasche</h2>

                <div class="cell small-12 medium-6 grid-x flex-center background-white beige-border-top-bottom padding-section margin-top-small no-margin-mobile display-mobile">
                    <div class="cell small-8">
                        <p class="font-primary-bold no-text-margin-mobile">Zwischensumme: </p>
                        <p class="font-secondary-bold">{{$totalPrice}} €</p>
                    </div>
                    <div class="cell small-4">
                        <a href="{{ route('default-checkout') }}" class="checkout-button">KASSE</a>
                    </div>
                </div>

                <div class="cell small-12 medium-12 large-6 background-white margin-top-small no-margin-mobile">
                    @foreach($products as $product)
                       <product-cart
                               key="{{$product['item']['id']}}"
                               title="{{$product['item']['name']}}"
                               price="{{$product['item']['price']}}"
                               img="{{$product['item']['image'][0]['img']}}"
                               author="{{$product['item']['author']['firstname'] . ' ' . $product['item']['author']['lastname']}}"
                               quantity="{{$product['quantity']}}"
                               id="{{$product['item']['id']}}"
                               size="1"
                       ></product-cart>
                    @endforeach
                </div>

                <div class="cell small-12 medium-12 large-6 grid-x flex-center background-white padding-section margin-top-small display-mobile-none" style="height: 20vh">
                    <div class="cell small-12 grid-x flex-center border-bottom">
                        <p class="cell small-8 medium-9 large-4 font-primary-bold">Zwischensumme: </p>
                        <p class="cell small-2 medium-3 large-2 font-secondary-bold">{{$totalPrice}} €</p>
                    </div>
                    <a href="{{ route('default-checkout') }}" class="checkout-button">ZUR KASSE</a>
                </div>

                    <a href="{{ route('default-checkout') }}" class="cell small-12 no-margin-mobile checkout-button display-mobile-only">ZUR KASSE</a>
            </section>
    @else
        <section class="grid-y" style="height: 35vh">
            <div class="grid-x flex-center">
                <p class="cell small-6 medium-cell-block placeholder">Sie haben noch keine Produkte in Ihrem Warenkorb.</p>
            </div>
        </section>

    @endif

@stop