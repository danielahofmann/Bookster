@extends('admin.pages.user-form')

@section('desktop-headline')
    anlegen
@endsection

@section('mobile-headline')
    Mitarbeiter anlegen
@endsection

@section('action'){{route('admin.user.store')}}@stop

@section('firstname', old('firstname'))
@section('lastname', old('lastname'))
@section('email', old('email'))

@section('pass')
    <div class="cell small-12">
        <label for="password" class="form-label">Passwort</label>

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
        <label for="password-confirm" class="form-label">Passwort wiederholen</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
        </div>
    </div>
@endsection

