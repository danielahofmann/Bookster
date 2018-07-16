@extends ('age-layouts.elderly')

@section('title', 'Registrierung' )

@section('main')
    <section class="fullscreen-beige-background grid-x flex-center">

        <h2 class="cell small-12 margin-top-bottom">Registrierung</h2>

        @if ($errors->any())
            <div class="cell small-12 flex-center alert-danger">
                <p class="alert-danger-box">Ups, da ist etwas schief gelaufen. Bitte Überprüfen Sie Ihre Angaben.</p>
            </div>
        @endif
        <form method="POST" action="{{ route('register') }}" class="login-form cell small-12 medium-6 large-5 grid-x grid-margin-x">
            @csrf

            <div class="cell small-12 medium-6">
                <label for="firstname" class="form-label">{{ __('Vorname') }}</label>

                <div>
                    <input id="firstname" type="text" class="input{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                           name="firstname" value="{{ old('firstname') }}" required autofocus>

                    @if ($errors->has('firstname'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('firstname') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="cell small-12 medium-6">
                <label for="lastname" class="form-label">{{ __('Nachname') }}</label>

                <div>
                    <input id="lastname" type="text" class="input{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                           name="lastname" value="{{ old('lastname') }}" required>

                    @if ($errors->has('lastname'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('lastname') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="cell small-12 medium-8">
                <label for="street" class="form-label">{{ __('Straße') }}</label>

                <div>
                    <input id="street" type="text" class="input{{ $errors->has('street') ? ' is-invalid' : '' }}"
                           name="street" value="{{ old('street') }}" required>

                    @if ($errors->has('street'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('street') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="cell small-12 medium-4">
                <label for="housenum" class="form-label">{{ __('Hausnr.') }}</label>

                <div>
                    <input id="housenum" type="text" class="input{{ $errors->has('housenum') ? ' is-invalid' : '' }}"
                           name="housenum" value="{{ old('housenum') }}" required>

                    @if ($errors->has('housenum'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('housenum') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="cell small-12 medium-4">
                <label for="postcode" class="form-label">{{ __('PLZ') }}</label>

                <div>
                    <input id="postcode" type="number" class="input{{ $errors->has('postcode') ? ' is-invalid' : '' }}"
                           name="postcode" value="{{ old('postcode') }}" required>

                    @if ($errors->has('postcode'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('postcode') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="cell small-12 medium-8">
                <label for="city" class="form-label">{{ __('Stadt') }}</label>

                <div>
                    <input id="city" type="text" class="input{{ $errors->has('city') ? ' is-invalid' : '' }}"
                           name="city" value="{{ old('city') }}" required>

                    @if ($errors->has('city'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="cell small-12">
                <label for="birthday" class="form-label">{{ __('Geburtstag') }}</label>

                <div>
                    <input id="birthday" type="date" class="input{{ $errors->has('birthday') ? ' is-invalid' : '' }}"
                           name="birthday" value="{{ old('birthday') }}" required>

                    @if ($errors->has('birthday'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('birthday') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="cell small-12">
                <label for="email" class="form-label">{{ __('E-Mail-Addresse') }}</label>

                <div>
                    <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="cell small-12">
                <label for="password" class="form-label">{{ __('Passwort') }}</label>

                <div>
                    <input id="password" type="password"
                           class="input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="cell small-12">
                <label for="password-confirm" class="form-label">{{ __('Passwort wiederholen') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
                </div>
            </div>

            <button type="submit" class="submit-button">
                {{ __('Registrieren') }}
            </button>
        </form>
    </section>
@stop