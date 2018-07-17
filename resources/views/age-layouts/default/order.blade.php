@extends ('age-layouts.default')

@section('title', 'Bestellung abschließen' )

@section('main')
    @if(session('status'))
        <p>{{session('status')}}</p>
    @endif

    <section class="fullscreen-beige-background">
        <form method="POST" action="{{ route('place-order') }}" class="grid-container">
            @csrf

            <div class="grid-x grid-margin-x">

                <h2 class="cell small-12">ZUR KASSE</h2>

                <div class="cell small-12 medium-8">
                    <div class="cell small-12 medium-8 grid-x order-box">
                        <div class="cell small-10">
                            <h4>Versandadresse</h4>
                            @if(!empty($delivery))
                                <p>{{$delivery['firstname']}} {{$delivery['lastname']}}</p>
                                <p>{{$delivery['street']}} {{$delivery['housenum']}}</p>
                                <p>{{$delivery['postcode']}} {{$delivery['city']}}</p>
                                <p>{{$delivery['email']}}</p>
                            @else
                            <p>{{$customer->firstname}} {{$customer->lastname}}</p>
                            <p>{{$customer->street}} {{$customer->housenum}}</p>
                            <p>{{$customer->postcode}} {{$customer->city}}</p>
                            <p>{{$customer->email}}</p>
                            @endif
                        </div>

                        <div class="cell small-2">
                            <button class="order-button" type="button" data-open="editDeliveryModal">bearbeiten</button>
                        </div>
                    </div>

                    <order-delivery></order-delivery>

                    <div class="cell small-12 medium-8 grid-x order-box">
                        <div class="cell small-10">
                            <h4>Zahlung</h4>

                            <h5>Rechnungsanschrift</h5>
                            @if(!empty($bill))
                                <p>{{$bill['firstname']}} {{$bill['lastname']}}</p>
                                <p>{{$bill['street']}} {{$bill['housenum']}}</p>
                                <p>{{$bill['postcode']}} {{$bill['city']}}</p>
                                <p>{{$bill['email']}}</p>
                            @else
                            <p>{{$customer->firstname}} {{$customer->lastname}}</p>
                            <p>{{$customer->street}} {{$customer->housenum}}</p>
                            <p>{{$customer->postcode}} {{$customer->city}}</p>
                            <p>{{$customer->email}}</p>
                                @endif
                        </div>

                        <div class="cell small-2">
                            <button class="order-button" type="button" data-open="editBillModal">bearbeiten</button>
                        </div>

                        <h5 class="cell small-12">Zahlungsart</h5>

                        <div class="cell payment small-12 grid-x">
                            <div class="cell small-10 payment-information">
                                <p class="title">Rechnung</p>
                                <p class="information">Rechnungsbetrag innerhalb von 2 Wochen überweisen</p>
                            </div>
                            <div class="cell small-2">
                                <input type="radio" name="payment" id="payment" value="rechnung">
                            </div>
                        </div>

                        <div class="cell payment small-12 grid-x">
                            <div class="cell small-10 payment-information">
                                <p class="title">Vorkasse</p>
                                <p class="information">Ihre Bestellung wird versandt, wenn Sie den Betrag überwiesen
                                    haben</p>
                            </div>
                            <div class="cell small-2">
                                <input type="radio" name="payment" id="payment" value="vorkasse">
                            </div>
                        </div>

                        <div class="cell payment small-12 grid-x">
                            <div class="cell small-10 payment-information">
                                <p class="title">Nachname</p>
                                <p class="information">Rechnung wird bei Lieferung bezahlt</p>
                            </div>
                            <div class="cell small-2">
                                <input type="radio" name="payment" id="payment" value="nachname">
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
                            <input type="checkbox" name="agb" id="agb" value="checked">
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
        </form>

        {{--Edit Delivery Address Form Modal--}}
        <div class="reveal" id="editDeliveryModal" data-reveal>
            <h5>Versandadresse bearbeiten</h5>

            <form action="{{ route('saveDeliveryAddress') }}" method="POST" class="grid-x grid-margin-x">
                @csrf

                <div class="cell small-6 medium-6">
                    <label for="firstname" class="form-label">Vorname</label>
                    <div>
                        <input id="firstname" type="text"
                               class="input{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                               name="firstname" value="{{ $customer->firstname}}" required autofocus>

                        @if ($errors->has('firstname'))
                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('firstname') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>
                <div class="cell small-6 medium-6">
                    <label for="lastname" class="form-label">Nachname</label>
                    <div>
                        <input id="lastname" type="text"
                               class="input{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                               name="lastname" value="{{$customer->lastname}}" required>

                        @if ($errors->has('lastname'))
                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>

                <div class="cell small-8 medium-8">
                    <label for="street" class="form-label">Straße</label>
                    <div>
                        <input id="street" type="text"
                               class="input{{ $errors->has('street') ? ' is-invalid' : '' }}"
                               name="street" value="{{$customer->street}}" required>

                        @if ($errors->has('street'))
                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('street') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>

                <div class="cell small-4 medium-4">
                    <label for="housenum" class="form-label">Hausnummer</label>
                    <div>
                        <input id="housenum" type="text"
                               class="input{{ $errors->has('housenum') ? ' is-invalid' : '' }}"
                               name="housenum" value="{{$customer->housenum}}" required>

                        @if ($errors->has('housenum'))
                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('housenum') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>

                <div class="cell small-4 medium-4">
                    <label for="city" class="form-label">Stadt</label>
                    <div>
                        <input id="city" type="text"
                               class="input{{ $errors->has('city') ? ' is-invalid' : '' }}"
                               name="city" value="{{$customer->city}}" required>

                        @if ($errors->has('city'))
                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>

                <div class="cell small-8 medium-8">
                    <label for="postcode" class="form-label">PLZ</label>
                    <div>
                        <input id="postcode" type="number"
                               class="input{{ $errors->has('postcode') ? ' is-invalid' : '' }}"
                               name="postcode" value="{{$customer->postcode}}" required>

                        @if ($errors->has('postcode'))
                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('postcode') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>

                <div class="cell small-12 medium-12">
                    <label for="email" class="form-label">E-Mail-Adresse</label>
                    <div>
                        <input id="email" type="email"
                               class="input{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               name="email" value="{{$customer->email}}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>

                <button type="submit" class="submit-button">Speichern</button>
            </form>

            <button class="close-button" data-close aria-label="Close reveal" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        {{--Edit Bill Address Form Modal--}}
        <div class="reveal" id="editBillModal" data-reveal>
            <h5>Rechnungsadresse bearbeiten</h5>

            <form action="{{ route('saveBillAddress') }}" method="POST" class="grid-x grid-margin-x">
                @csrf

                <div class="cell small-6 medium-6">
                    <label for="firstname" class="form-label">Vorname</label>
                    <div>
                        <input id="firstname" type="text"
                               class="input{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                               name="firstname" value="{{ $customer->firstname}}" required autofocus>

                        @if ($errors->has('firstname'))
                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('firstname') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>
                <div class="cell small-6 medium-6">
                    <label for="lastname" class="form-label">Nachname</label>
                    <div>
                        <input id="lastname" type="text"
                               class="input{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                               name="lastname" value="{{$customer->lastname}}" required>

                        @if ($errors->has('lastname'))
                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>

                <div class="cell small-8 medium-8">
                    <label for="street" class="form-label">Straße</label>
                    <div>
                        <input id="street" type="text"
                               class="input{{ $errors->has('street') ? ' is-invalid' : '' }}"
                               name="street" value="{{$customer->street}}" required>

                        @if ($errors->has('street'))
                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('street') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>

                <div class="cell small-4 medium-4">
                    <label for="housenum" class="form-label">Hausnummer</label>
                    <div>
                        <input id="housenum" type="text"
                               class="input{{ $errors->has('housenum') ? ' is-invalid' : '' }}"
                               name="housenum" value="{{$customer->housenum}}" required>

                        @if ($errors->has('housenum'))
                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('housenum') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>

                <div class="cell small-4 medium-4">
                    <label for="city" class="form-label">Stadt</label>
                    <div>
                        <input id="city" type="text"
                               class="input{{ $errors->has('city') ? ' is-invalid' : '' }}"
                               name="city" value="{{$customer->city}}" required>

                        @if ($errors->has('city'))
                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>

                <div class="cell small-8 medium-8">
                    <label for="postcode" class="form-label">PLZ</label>
                    <div>
                        <input id="postcode" type="number"
                               class="input{{ $errors->has('postcode') ? ' is-invalid' : '' }}"
                               name="postcode" value="{{$customer->postcode}}" required>

                        @if ($errors->has('postcode'))
                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('postcode') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>

                <div class="cell small-12 medium-12">
                    <label for="email" class="form-label">E-Mail-Adresse</label>
                    <div>
                        <input id="email" type="email"
                               class="input{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               name="email" value="{{$customer->email}}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <button type="submit" class="submit-button">Speichern</button>
            </form>

            <button class="close-button" data-close aria-label="Close reveal" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    </section>

@endsection