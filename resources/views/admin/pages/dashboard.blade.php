@extends ('admin.admin')

@section('title', 'Dashboard' )

@section('main')
    <section class="beige fullscreen-beige-background admin-fullscreen no-padding-mobile">
        <div class="grid-container beige no-padding-mobile">
            <section class="fullscreen-beige-background grid-x grid-margin-x no-margin-mobile no-padding-mobile">
                <div class="cell small-12 medium-6 large-8 display-mobile-only no-margin-mobile">
                    <img src="/img/dashboard-welcome.png" alt="Willkommen im Admin-Dashboard" class="dashboard-image">
                </div>

                @php($firstchar =  substr($user->firstname, 0, 1))
                @php($scndchar =  substr($user->lastname, 0, 1))

                <admin-dashboard-menu
                        :user-data="{{$user}}"
                        firstchar="{{$firstchar}}"
                        scndchar="{{$scndchar}}"
                        :overview-template="true"
                        token="{!! csrf_token() !!}"
                ></admin-dashboard-menu>

                <div class="cell small-12 medium-6 large-8">
                    <div class="dashboard-headline display-mobile-none">
                        <div>
                            <feather-user></feather-user>
                        </div>
                        <h2>Meine Angaben</h2>
                    </div>

                    <div class="cell small-12 medium-8 grid-x order-box">
                        <div class="cell small-12 grid-x">
                            <p class="cell small-12 medium-2">Name:</p>
                            <p class="cell small-12 medium-10">{{$user->firstname}} {{$user->lastname}}</p>
                            <p class="cell small-12 medium-2">E-Mail:</p>
                            <p class="cell small-12 medium-10">{{$user->email}}</p>
                        </div>

                        <div class="cell small-12 flex-center padding-top-large">
                            <button class="button button-outline-blue" type="button" data-open="editModal">Angaben bearbeiten</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>

    {{--Edit Form Modal--}}
    <div class="reveal" id="editModal" data-reveal>
        <h5>Benutzerangaben bearbeiten</h5>

        <form action="{{ route('saveUserData') }}" method="POST" class="grid-x grid-margin-x">
            @csrf

            <div class="cell small-6 medium-6">
                <label for="firstname" class="form-label">Vorname</label>
                <div>
                    <input id="firstname" type="text"
                           class="input{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                           name="firstname" value="{{$user->firstname}}" required autofocus>

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
                           name="lastname" value="{{$user->lastname}}" required>

                    @if ($errors->has('lastname'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('lastname') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="cell small-12 medium-12">
                <label for="email" class="form-label">E-Mail-Adresse</label>
                <div>
                    <input id="email" type="email"
                           class="input{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" value="{{$user->email}}" required>

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
