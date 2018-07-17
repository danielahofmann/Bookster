@extends ('age-layouts.default')

@section('title', 'Bestellung abschließen' )

@section('main')

    <section class="fullscreen-beige-background">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">

                <h2 class="cell small-12">ZUR KASSE</h2>

                <div class="cell small-12 medium-8">
                    <div class="cell small-12 medium-8 grid-x order-box">
                        <div class="cell small-10">
                            <h4>Versandadresse</h4>
                            <p>{{$customer->firstname}} {{$customer->lastname}}</p>
                            <p>{{$customer->street}} {{$customer->housenum}}</p>
                            <p>{{$customer->postcode}} {{$customer->city}}</p>
                            <p>{{$customer->email}}</p>
                        </div>

                        <div class="cell small-2">
                            <button class="order-button">bearbeiten</button>
                        </div>
                    </div>

                    <order-delivery></order-delivery>

                    <div class="cell small-12 medium-8 grid-x order-box">
                        <div class="cell small-10">
                            <h4>Zahlung</h4>

                            <h5>Rechnungsanschrift</h5>
                            <p>{{$customer->firstname}} {{$customer->lastname}}</p>
                            <p>{{$customer->street}} {{$customer->housenum}}</p>
                            <p>{{$customer->postcode}} {{$customer->city}}</p>
                            <p>{{$customer->email}}</p>
                        </div>

                        <div class="cell small-2">
                            <button class="order-button">bearbeiten</button>
                        </div>


                        <h5 class="cell small-12">Zahlungsart</h5>

                        <div class="cell payment small-12 grid-x">
                            <div class="cell small-10 payment-information">
                                <p class="title">Rechnung</p>
                                <p class="information">Rechnungsbetrag innerhalb von 2 Wochen überweisen</p>
                            </div>
                            <div class="cell small-2">
                                <input type="radio" name="payment" id="payment">
                            </div>
                        </div>

                        <div class="cell payment small-12 grid-x">
                            <div class="cell small-10 payment-information">
                                <p class="title">Vorkasse</p>
                                <p class="information">Ihre Bestellung wird versandt, wenn Sie den Betrag überwiesen
                                    haben</p>
                            </div>
                            <div class="cell small-2">
                                <input type="radio" name="payment" id="payment">
                            </div>
                        </div>

                        <div class="cell payment small-12 grid-x">
                            <div class="cell small-10 payment-information">
                                <p class="title">Nachname</p>
                                <p class="information">Rechnung wird bei Lieferung bezahlt</p>
                            </div>
                            <div class="cell small-2">
                                <input type="radio" name="payment" id="payment">
                            </div>
                        </div>
                    </div>

                    <div class="cell small-12 medium-8 grid-x order-box">
                        <div class="cell small-10">
                            <h4>Allgemeine Geschäftsbedingungen</h4>
                            <p class="information">Mit der Übermittlung der für die Abwicklung der gewählten Klarna
                                Zahlungsmethode und einer Identitäts- und Bonitätsprüfung erforderlichen Daten an Klarna
                                bin ich einverstanden. Meine Einwilligung kann ich jederzeit mit Wirkung für die Zukunft
                                widerrufen. Es gelten die AGB des Händlers Rechnungsbedingungen. </p>
                        </div>

                        <div class="cell small-2 flex-center">
                            <input type="checkbox" name="agb" id="agb">
                        </div>
                    </div>

                    <button type="submit" class="submit-button">Jetzt Bestellen</button>
                </div>

                <div class="cell small-12 medium-4">
                    <div class="order-box">
                        <h4>Artikel</h4>

                        @foreach($products as $product)
                            <product-order
                                    key="{{$product['item']['id']}}"
                                    title="{{$product['item']['name']}}"
                                    price="{{$product['item']['price']}}"
                                    img="{{$product['item']['image'][0]['img']}}"
                                    author="{{$product['item']['author']['firstname'] . ' ' . $product['item']['author']['lastname']}}"
                                    quantity="{{$product['quantity']}}"
                                    id="{{$product['item']['id']}}"
                                    size="1"
                            ></product-order>
                        @endforeach

                        <hr>

                        <order-bill
                                :sub-total="{{$totalPrice}}"
                        ></order-bill>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection