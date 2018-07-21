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
                <div class="cell small-12 medium-6 large-8 display-mobile-only no-margin-mobile">
                    <img src="/img/dashboard-welcome.png" alt="Willkommen im Admin-Dashboard" class="dashboard-image">
                </div>

                @php($firstchar =  substr($user->firstname, 0, 1))
                @php($scndchar =  substr($user->lastname, 0, 1))

                <admin-dashboard-menu
                        :user-data="{{$user}}"
                        firstchar="{{$firstchar}}"
                        scndchar="{{$scndchar}}"
                        :order-view="true"
                        token="{!! csrf_token() !!}"
                ></admin-dashboard-menu>

                <div class="cell small-12 medium-6 large-8">
                    <div class="dashboard-headline display-mobile-none">
                        <div>
                            <feather-package></feather-package>
                        </div>
                        <h2>Bestellung Nr. {{$order->id}}</h2>
                    </div>


                </div>
            </section>
        </div>
    </section>
@stop
