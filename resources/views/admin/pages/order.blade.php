@extends ('admin.admin')

@section('title', 'Bestellungen' )

@section('main')
    <section class="beige fullscreen-beige-background admin-fullscreen no-padding-mobile">
        <div class="grid-container beige no-padding-mobile">
            <section class="fullscreen-beige-background grid-x grid-margin-x no-margin-mobile no-padding-mobile">
                @php($firstchar =  substr($user->firstname, 0, 1))
                @php($scndchar =  substr($user->lastname, 0, 1))

                <admin-dashboard-menu
                        :user-data="{{$user}}"
                        firstchar="{{$firstchar}}"
                        scndchar="{{$scndchar}}"
                        :order-view="true"
                        token="{!! csrf_token() !!}"
                        class="display-mobile-none"
                ></admin-dashboard-menu>

                <div class="cell small-12 medium-6 large-8 no-margin-mobile">

                    <div class="dashboard-headline display-mobile-none grid-x">
                        <div class="cell small-12">
                            <feather-package></feather-package>
                        </div>
                        <h2 class="cell small-10">Bestellung Nr. {{$order->id}}</h2>
                        <div class="cell small-2">
                            <button class="order-button margin-top-1 full-width text-center" type="button" data-open="editOrderModal">bearbeiten</button>
                            <button class="order-button margin-top-1 full-width text-center" type="button" data-open="deleteOrderModal">löschen</button>
                        </div>
                    </div>

                    <admin-mobile-redirect
                            headline="Bestellung Nr. {{$order->id}}"
                    ></admin-mobile-redirect>
                    <div class="grid-x">
                        <button class="cell small-6 display-mobile-only order-button mobile-button-white text-center" type="button" data-open="editOrderModal">bearbeiten</button>
                        <button class="cell small-6 display-mobile-only order-button mobile-button-white text-center" type="button" data-open="deleteOrderModal">löschen</button>
                    </div>

                    <div class="order-details">
                        <p class="headline">Status: <span>{{$order->state->name}}</span></p>
                        <p class="headline">Best.-Nr.: <span>{{$order->id}}</span></p>
                        <p class="headline">Kunde: <span>{{$order->customer->firstname }} {{$order->customer->lastname }}</span></p>
                        <p class="headline">Kundennummer: <span>{{$order->customer->id}}</span></p>
                        <p class="headline">Bestelldatum: <span>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}</span></p>
                        <p class="headline">Versanddatum: <span>{{  !empty($order->send_at) ? \Carbon\Carbon::parse($order->send_at)->format('d/m/Y') : 'Noch nicht versendet'}}</span></p>
                    </div>

                    <div class="order-details grid-x">
                        <p class="headline cell small-12 border-beige-bottom">Artikel</p>
                        @foreach ($order->products as $product)
                            <div class="cell small-4 medium-3">
                                <img src="{{asset('storage/product-image/') . '/' . $product->image[0]['img']}}" alt="{{$product->name}}">
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
    </section>

    {{--Edit Order Form Modal--}}
    <div class="reveal" id="editOrderModal" data-reveal>
        <h5>Bestellung bearbeiten</h5>

        <form action="{{ route('admin.order.update', $order->id) }}" method="POST" class="grid-x grid-margin-x">
            {{ method_field('PATCH') }}
            @csrf

            <div class="cell small-12 medium-12">
                <label for="state" class="form-label">Status</label>
                <div>
                    <select name="state" id="state" class="input">
                        @foreach ($states as $state)
                        <option value="{{$state->id}}" {{$order->state->id === $state->id ? 'selected' : '' }}>
                            {{$state->name}}
                        </option>
                        @endforeach
                    </select>

                    @if ($errors->has('state'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="cell small-12 medium-12">
                <label for="send_at" class="form-label">Versanddatum</label>
                <div>
                    <input id="send_at" type="date"
                           class="input{{ $errors->has('send_at') ? ' is-invalid' : '' }}"
                           name="send_at" value="{{ $order->send_at }}" autofocus>

                    @if ($errors->has('send_at'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('send_at') }}</strong>
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

    {{--Delete Order Modal--}}
    <div class="reveal" id="deleteOrderModal" data-reveal>
        <h5>Bestellung löschen</h5>

        <form action="{{ route('admin.order.delete', $order->id) }}" method="POST" class="grid-x grid-margin-x">
            {{ method_field('DELETE') }}
            @csrf

            <p class="text-modal">Bitte bedenken Sie, dass das Löschen nicht mehr rückgängig gemacht werden kann. Bei Fragen wenden Sie sich bitte an einen Vorgesetzten.</p>

            <button type="submit" class="submit-button">unwiderruflich löschen</button>
        </form>

        <button class="close-button" data-close aria-label="Close reveal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@stop
