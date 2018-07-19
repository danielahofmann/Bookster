@extends ('age-layouts.default')

@section('title', 'Dashboard' )

@section('main')
    <div class="beige">
        <div class="grid-container beige no-padding-mobile">
            <section class="fullscreen-beige-background grid-x grid-margin-x no-margin-mobile no-padding-mobile">
                @php($firstchar =  substr($customer->firstname, 0, 1))
                @php($scndchar =  substr($customer->lastname, 0, 1))

                <dashboard-menu
                        :customer-data="{{$customer}}"
                        firstchar="{{$firstchar}}"
                        scndchar="{{$scndchar}}"
                        :order-view="true"
                        token="{!! csrf_token() !!}"
                        class="display-mobile-none"
                        :path-start="'default-dashboard'"
                        :path-user="'default-dashboard-user'"
                        :path-order="'default-dashboard-order'"
                ></dashboard-menu>

                <div class="cell small-12 medium-6 large-8 no-margin-mobile">
                    <div class="dashboard-headline display-mobile-none">
                        <h2>Bestelldetails</h2>
                    </div>

                    <div class="display-mobile-flex dashboard-redirect grid-x">
                        <div class="cell small-2 flex-center">
                            <a href="{{route('default-dashboard')}}">
                                <img src="/img/redirect-back.svg" alt="Zurück">
                            </a>
                        </div>

                        <h2 class="cell small-10 text-left">Bestelldetails</h2>
                    </div>

                    <div class="order-details">
                        <p class="headline">{{$order->state->name}}</p>
                        <p class="headline">Best.-Nr.: <span>{{$order->id}}</span></p>
                        <p class="headline">Bestelldatum: <span>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}</span></p>
                        <p class="headline">Versanddatum: <span>{{  !empty($order->send_at) ? \Carbon\Carbon::parse($order->send_at)->format('d/m/Y') : 'Noch nicht versendet'}}</span></p>
                    </div>

                    <div class="order-details grid-x">
                        <p class="headline cell small-12 border-beige-bottom">Artikel</p>
                        @foreach ($order->products as $product)
                            <div class="cell small-4 medium-3">
                                <img src="{{$product->image[0]['img']}}" alt="{{$product->name}}">
                                <p class="product-name">{{$product->name}}</p>
                                <p>{{$product->price}} €</p>
                            </div>
                        @endforeach
                    </div>

                    <div class="order-details">
                        <p class="headline border-beige-bottom">Rechnungsdetails</p>
                        <p class="headline">Rechnungsadresse:</p>
                        <p class="address">{{$bill->firstname}} {{$bill->lastname}}</p>
                        <p class="address">{{$bill->street}} {{$bill->housenum}}</p>
                        <p class="address">{{$bill->postcode}} {{$bill->city}}</p>
                        <p class="headline">Zahlungsmethode:</p>
                        <p class="address">{{$order->payment_method == 'vorkasse' ? 'Vorkasse' : ''}}</p>
                        <p class="address">{{$order->payment_method == 'rechnung' ? 'Rechnung' : ''}}</p>
                        <p class="address">{{$order->payment_method == 'nachname' ? 'Nachname' : ''}}</p>
                    </div>

                    <div class="order-details">
                        <p class="headline border-beige-bottom">Versanddetails</p>
                        <p class="headline">Lieferadresse:</p>
                        <p class="address">{{$delivery->firstname}} {{$delivery->lastname}}</p>
                        <p class="address">{{$delivery->street}} {{$delivery->housenum}}</p>
                        <p class="address">{{$delivery->postcode}} {{$delivery->city}}</p>
                        <p class="headline">Versandart:</p>
                        <p class="address">{{$order->shipping_method == 'standard' ? 'Standardversand' : 'Expressversand'}}</p>

                    </div>

                    <div class="order-details">
                        <p class="headline">Rechnungsbetrag</p>
                        <p>{{$order->price}} €</p>
                    </div>
                </div>

            </section>
        </div>
    </div>
@stop