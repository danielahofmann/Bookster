@extends ('age-layouts.teens')

@section('title', 'Neues Passwort erstellen' )

@section('main')
    <section class="fullscreen-beige-background grid-x flex-center">
        <h2 class="cell small-12 margin-top-bottom">Passwort zurücksetzen</h2>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.request') }}"
              class="login-form cell small-12 medium-6 large-5 grid-x grid-margin-x">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

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
                    <input id="password" type="password" class="input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="cell small-12">
                <label for="password-confirm" class="form-label">{{ __('Passwort wiederholen') }}</label>

                <div>
                    <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
                </div>
            </div>

            <button type="submit" class="submit-button">
                {{ __('Passwort zurücksetzen') }}
            </button>
        </form>
    </section>
@stop