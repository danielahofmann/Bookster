@extends ('age-layouts.seniors')

@section('title', 'Dashboard' )

@section('main')
    @if(session('status'))
        <alert-success-popup
                status="{{session('status')}}"
        ></alert-success-popup>
    @endif

    <div class="beige">
        <div class="grid-container beige no-padding-mobile">
            <section class="fullscreen-beige-background grid-x grid-margin-x no-margin-mobile no-padding-mobile">
                @php($firstchar =  substr($customer->firstname, 0, 1))
                @php($scndchar =  substr($customer->lastname, 0, 1))

                <dashboard-menu
                        :customer-data="{{$customer}}"
                        firstchar="{{$firstchar}}"
                        scndchar="{{$scndchar}}"
                        :user-view="true"
                        token="{!! csrf_token() !!}"
                        class="display-mobile-none"
                        :path-user="'seniors-dashboard-user'"
                        :path-order="'seniors-dashboard-order'"
                        :path-start="'seniors-dashboard'"
                ></dashboard-menu>

                <div class="cell small-12 medium-6 large-8">
                    <div class="dashboard-headline">
                        <div>
                            <feather-settings></feather-settings>
                        </div>
                        <h2>Meine Angaben</h2>
                    </div>
                    <div class="display-mobile-flex dashboard-redirect grid-x">
                        <div class="cell small-2 flex-center">
                            <a href="{{route('seniors-dashboard')}}">
                                <img src="/img/redirect-back.svg" alt="Zurück">
                            </a>
                        </div>

                        <h2 class="cell small-10 text-left">Meine Angaben</h2>
                    </div>

                    <div class="cell small-12 medium-8 grid-x order-box">
                        <div class="cell small-10">
                            <p>{{$customer->firstname}} {{$customer->lastname}}</p>
                            <p>{{$customer->street}} {{$customer->housenum}}</p>
                            <p>{{$customer->postcode}} {{$customer->city}}</p>
                            <p>{{$customer->email}}</p>
                        </div>

                        <div class="cell small-2">
                            <button class="order-button" type="button" data-open="editDeliveryModal">bearbeiten</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


    {{--Edit Delivery Address Form Modal--}}
    <div class="reveal" id="editDeliveryModal" data-reveal>
        <h5>Benutzerangaben bearbeiten</h5>

        <form action="{{ route('saveCustomerData') }}" method="POST" class="grid-x grid-margin-x">
            @csrf

            <div class="cell small-6 medium-6">
                <label for="firstname" class="form-label">Vorname</label>
                <div>
                    <input id="firstname" type="text"
                           class="input{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                           name="firstname" value="{{$customer->firstname}}" required autofocus>

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
@stop