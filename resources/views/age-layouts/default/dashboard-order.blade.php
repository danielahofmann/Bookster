@extends ('age-layouts.default')

@section('title', 'Dashboard' )

@section('main')
    <div class="beige">
        <div class="grid-container beige no-padding-mobile">
            <section class="fullscreen-beige-background grid-x grid-margin-x no-margin-mobile no-padding-mobile">
                @php($firstchar =  substr($customer->firstname, 0, 1))
                @php($scndchar =  substr($customer->lastname, 0, 1))

                <dashboard-menu
                        :customer-data="{{$customer}}"
                        firstchar="{{$firstchar}}"
                        scndchar="{{$scndchar}}"
                        :order-view="true"
                        token="{!! csrf_token() !!}"
                        class="display-mobile-none"
                        :path-start="'default-dashboard'"
                        :path-user="'default-dashboard-user'"
                        :path-order="'default-dashboard-order'"
                ></dashboard-menu>

                <div class="cell small-12 medium-6 large-8 no-margin-mobile">
                    <div class="dashboard-headline display-mobile-none">
                        <div>
                            <feather-package></feather-package>
                        </div>
                        <h2>Meine Bestellungen</h2>
                    </div>

                    <div class="display-mobile-flex dashboard-redirect grid-x">
                        <div class="cell small-2 flex-center">
                            <a href="{{route('default-dashboard')}}">
                                <img src="/img/redirect-back.svg" alt="Zurück">
                            </a>
                        </div>

                        <h2 class="cell small-10 text-left">Meine Bestellungen</h2>
                    </div>
            </section>
        </div>
    </div>
@stop