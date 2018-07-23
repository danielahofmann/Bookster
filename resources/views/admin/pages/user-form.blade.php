@extends ('admin.admin')

@section('title', 'Bestellungen' )

@section('main')
    @if(session('status'))
        <alert-success-popup
                status="{{session('status')}}"
        ></alert-success-popup>
    @endif

    <section class="beige fullscreen-beige-background admin-fullscreen no-padding-mobile">
        <div class="grid-container beige no-padding-mobile">
            <section class="fullscreen-beige-background grid-x grid-margin-x no-margin-mobile no-padding-mobile">
                @php($firstchar =  substr($user->firstname, 0, 1))
                @php($scndchar =  substr($user->lastname, 0, 1))

                <admin-dashboard-menu
                        :user-data="{{$user}}"
                        firstchar="{{$firstchar}}"
                        scndchar="{{$scndchar}}"
                        :user-view="true"
                        token="{!! csrf_token() !!}"
                        class="display-mobile-none"
                ></admin-dashboard-menu>

                <div class="cell small-12 medium-6 large-8 no-margin-mobile">

                    <div class="dashboard-headline display-mobile-none">
                        <div>
                            <feather-user></feather-user>
                        </div>
                        <h2>Mitarbeiter @yield('desktop-headline')</h2>
                    </div>

                    <admin-mobile-redirect
                            headline="@yield('mobile-headline')"
                    ></admin-mobile-redirect>

                    <div class="order-details">
                        <form action="@yield('action')" method="POST">
                            @yield('method')
                            @csrf

                            <div class="cell small-12 medium-12">
                                <label for="firstname" class="form-label">Vorname</label>
                                <div>
                                    <input id="firstname" type="text"
                                           class="input{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                           name="firstname" value="@yield('firstname')" autofocus>

                                    @if ($errors->has('firstname'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="cell small-12 medium-12">
                                <label for="lastname" class="form-label">Nachname</label>
                                <div>
                                    <input id="lastname" type="text"
                                           class="input{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                           name="lastname" value="@yield('lastname')" required>

                                    @if ($errors->has('lastname'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="cell small-12 medium-12">
                                <label for="email" class="form-label">E-Mail</label>
                                <div>
                                    <input id="email" type="email"
                                           class="input{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="@yield('email')" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="cell small-12 medium-12">
                                <label for="role" class="form-label">Rolle</label>
                                <div>

                                    <select name="role" id="role" class="input">
                                        <option value="3" @yield('role-3')>Mitarbeiter</option>
                                        <option value="1" @yield('role-1')>Administrator</option>
                                    </select>

                                    @if ($errors->has('role'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            @yield('pass')

                            <button type="submit" class="submit-button">Speichern</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </section>
@stop
