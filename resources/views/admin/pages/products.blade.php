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

                    <div class="dashboard-headline display-mobile-none grid-x">
                        <div class="cell small-12">
                            <feather-book></feather-book>
                        </div>
                        <h2 class="cell medium-7 large-10">Produkte</h2>
                        <div class="cell medium-5 large-2">
                            <a href="{{route('admin.product.create')}}">
                                <button class="order-button margin-top-1 full-width text-center display-none-tablet">hinzufügen</button>
                            </a>
                        </div>
                    </div>

                    <admin-mobile-redirect
                            headline="Produkte"
                    ></admin-mobile-redirect>

                    <a href="{{route('admin.product.create')}}">
                        <button class="cell small-6 display-tablet order-button mobile-button-white full-width text-center">hinzufügen</button>
                    </a>

                    <div class="grid-x">
                        @foreach($products as $product)
                            <div class="cell small-12 medium-12 large-4">
                                <div class="order-details margin-right-1">
                                    <img src="{{ asset('storage/product-image/' . $product->image[0]->img) }}"
                                         alt="{{$product->name}}">
                                    <p class="headline">Produkt-Nr.: <span>{{$product->id}}</span></p>
                                    <a href="{{route('admin.product.edit', $product->id)}}">
                                        <button class="order-button margin-top-1 full-width text-center">
                                            bearbeiten
                                        </button>
                                    </a>
                                    <a href="{{route('admin.product.delete-form', $product->id)}}">
                                        <button class="order-button margin-top-1 full-width text-center">
                                            löschen
                                        </button>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </section>
@stop
