@extends ('admin.admin')

@section('title', 'Autor' )

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
                        :author-view="true"
                        token="{!! csrf_token() !!}"
                        class="display-mobile-none"
                ></admin-dashboard-menu>

                <div class="cell small-12 medium-6 large-8 no-margin-mobile">

                    <div class="dashboard-headline display-mobile-none">
                        <div>
                            <feather-user></feather-user>
                        </div>
                        <h2>Autor @yield('desktop-headline')</h2>
                    </div>

                    <admin-mobile-redirect
                            headline="@yield('mobile-headline')"
                    ></admin-mobile-redirect>

                    <div class="order-details">
                        <form action="@yield('action')" method="POST" enctype="multipart/form-data">
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

                            <div class="cell small-12 flex-center margin-top-bottom">
                                <label for="image" class="order-button file-label">Autoren-Bild hochladen</label>
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
