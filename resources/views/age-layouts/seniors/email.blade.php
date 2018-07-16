@extends('age-layouts.seniors')

@section('title', 'Passwort zurücksetzen' )

@section('main')
    <section class="fullscreen-beige-background grid-x flex-center padding-top-eight">
        <h2 class="cell small-12 margin-top-bottom">Passwort zurücksetzen</h2>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}"
              class="login-form cell small-12 medium-6 large-5 grid-x grid-margin-x">
            @csrf

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

            <button type="submit" class="submit-button">
                {{ __('Neues Passwort anfordern') }}
            </button>
        </form>
    </section>
@endsection
