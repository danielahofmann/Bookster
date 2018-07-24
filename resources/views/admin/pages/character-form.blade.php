@extends ('admin.admin')

@section('title', 'Charakter' )

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
                        :character-view="true"
                        token="{!! csrf_token() !!}"
                        class="display-mobile-none"
                ></admin-dashboard-menu>

                <div class="cell small-12 medium-6 large-8 no-margin-mobile">

                    <div class="dashboard-headline display-mobile-none">
                        <div>
                            <feather-user></feather-user>
                        </div>
                        <h2>Charakter @yield('desktop-headline')</h2>
                    </div>

                    <admin-mobile-redirect
                            headline="@yield('mobile-headline')"
                    ></admin-mobile-redirect>

                    <div class="order-details">
                        <form action="@yield('action')" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="cell small-12 medium-12">
                                <label for="name" class="form-label">Name des Charakters</label>
                                <div>
                                    <input id="name" type="text"
                                           class="input{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="@yield('name')" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="cell small-12 grid-x margin-top-small">
                                <div class="cell small-10 payment-information">
                                    <p class="information">Der Charakter ist ein Kinderbuch-Charakter.</p>
                                </div>
                                <div class="cell small-2">
                                    <input type="radio" name="toddler" id="toddler" value="1" required>
                                </div>
                            </div>

                            <div class="cell small-12 grid-x">
                                <div class="cell small-10 payment-information">
                                    <p class="information">Der Charakter ist <b>kein</b> Kinderbuch-Charakter.</p>
                                </div>
                                <div class="cell small-2">
                                    <input type="radio" name="toddler" id="toddler" value="0" required>
                                </div>
                            </div>

                            <div class="cell small-12 flex-center margin-top-bottom">
                                <label for="image" class="order-button file-label">Charakter-Bild hochladen</label>
                                <div>
                                    <input id="image" type="file" class="inputfile
                                           {{ $errors->has('image') ? ' is-invalid' : '' }}" name="image">

                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="submit-button">Speichern</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </section>
@stop
