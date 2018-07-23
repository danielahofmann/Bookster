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
                        :product-view="true"
                        token="{!! csrf_token() !!}"
                        class="display-mobile-none"
                ></admin-dashboard-menu>

                <div class="cell small-12 medium-6 large-8 no-margin-mobile">

                    <div class="dashboard-headline display-mobile-none">
                        <div>
                            <feather-book></feather-book>
                        </div>
                        <h2>Produkt @yield('desktop-headline')</h2>
                    </div>

                    <admin-mobile-redirect
                            headline="@yield('mobile-headline')"
                    ></admin-mobile-redirect>

                    <div class="order-details">
                        <form action="@yield('action')" method="POST">
                            @yield('method')
                            @csrf

                            <div class="cell small-12 medium-12">
                                <label for="name" class="form-label">Produkt-Name</label>
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

                            <div class="cell small-12 medium-12">
                                <label for="price" class="form-label">Preis</label>
                                <div>
                                    <input id="price" type="text"
                                           class="input{{ $errors->has('price') ? ' is-invalid' : '' }}"
                                           name="price" value="@yield('price')" required>

                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="cell small-12 medium-12">
                                <label for="description" class="form-label">Beschreibung</label>
                                <div>
                                    <textarea id="description" type="text"
                                           class="input textarea {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                              name="description" required>@yield('description')</textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="cell small-12 medium-12">
                                <label for="amount" class="form-label">Anzahl im Lager vorhandener Artikel</label>
                                <div>
                                    <input id="amount" type="text"
                                              class="input {{ $errors->has('amount') ? ' is-invalid' : '' }}"
                                              name="amount" required value="@yield('amount')">

                                    @if ($errors->has('amount'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="cell small-12 medium-12">
                                <label for="release" class="form-label">Release-Datum</label>
                                <div>
                                    <input id="release" type="date"
                                              class="input {{ $errors->has('release') ? ' is-invalid' : '' }}"
                                              name="release" required value="@yield('release')">

                                    @if ($errors->has('release'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('release') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="cell small-12 medium-12">
                                <label for="category" class="form-label">Kategorie</label>
                                <div>
                                    <select name="category" id="category" class="input">
                                       @yield('category')
                                    </select>

                                    @if ($errors->has('category'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="cell small-12 medium-12">
                                <label for="genre" class="form-label">Genre</label>
                                <div>
                                    <select name="genre" id="genre" class="input">
                                        @yield('genre')
                                    </select>

                                    @if ($errors->has('genre'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('genre') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="cell small-12 medium-12">
                                <label for="author" class="form-label">Autor</label>
                                <div>
                                    <select name="author" id="author" class="input">
                                        @yield('author')
                                    </select>

                                    @if ($errors->has('author'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('author') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="cell small-12 medium-12">
                                <label for="character" class="form-label">Charakter</label>
                                <div>
                                    <select name="character" id="character" class="input">
                                        <option value="0">Kein Charakter vorhanden</option>
                                        @yield('character')
                                    </select>

                                    @if ($errors->has('character'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('character') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="cell small-12 grid-x margin-top-small">
                                <div class="cell small-10 payment-information">
                                    <p class="information">Das Buch ist ein Bestseller</p>
                                </div>
                                <div class="cell small-2">
                                    <input type="radio" name="bestseller" id="bestseller" value="1" required>
                                </div>
                            </div>

                            <div class="cell small-12 grid-x">
                                <div class="cell small-10 payment-information">
                                    <p class="information">Das Buch ist <b>kein</b> Bestseller.</p>
                                </div>
                                <div class="cell small-2">
                                    <input type="radio" name="bestseller" id="bestseller" value="0" required>
                                </div>
                            </div>

                            <div class="cell small-12">
                                <label for="image" class="form-label">Buchcover</label>
                                <div>
                                    <input id="image" type="file"
                                           class="input {{ $errors->has('image') ? ' is-invalid' : '' }}"
                                           name="image">

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
