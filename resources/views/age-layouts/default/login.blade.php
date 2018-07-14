@extends ('age-layouts.default')

@section('title', 'Login' )

@section('main')
    <section class="fullscreen-beige-background grid-x flex-center">
        <form method="POST" action="{{ route('login') }}" class="login-form cell small-12 medium-6 large-4">
            @csrf

            <div>
                <label for="email" class="form-label">{{ __('E-Mail-Addresse') }}</label>

                <div>
                    <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div>
                <label for="password" class="form-label">{{ __('Passwort') }}</label>

                <div>
                    <input id="password" type="password"
                           class="input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                           required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <button type="submit" class="submit-button">
                {{ __('Anmelden') }}
            </button>

            <div class="flex-center">
                <a class="login-sublinks" href="{{ route('password.request') }}">{{ __('Passwort vergessen') }}</a>

                <p class="login-sublinks">|</p>

                <a class="login-sublinks" href="{{ route('default-register') }}">{{ __('Noch kein Mitglied?') }}</a>
            </div>
        </form>
    </section>
@stop