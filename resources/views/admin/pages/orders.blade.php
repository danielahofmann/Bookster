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
                        :order-view="true"
                        token="{!! csrf_token() !!}"
                        class="display-mobile-none"
                ></admin-dashboard-menu>

                <div class="cell small-12 medium-6 large-8 no-margin-mobile">
                    <div class="dashboard-headline display-mobile-none">
                        <div>
                            <feather-package></feather-package>
                        </div>
                        <h2>Bestellungen</h2>
                    </div>

                    <div class="display-mobile-flex dashboard-redirect grid-x">
                        <div class="cell small-2 flex-center">
                            <a href="{{route('admin.dashboard')}}">
                                <img src="/img/redirect-back.svg" alt="Zurück">
                            </a>
                        </div>

                        <h2 class="cell small-10 text-left">Bestellungen</h2>
                    </div>

                    @foreach($orders as $order)
                        <admin-order-preview
                                state="{{$order->state->name}}"
                                date="{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}"
                                id=" {{$order->id}}"
                                path="default-order-details"
                        ></admin-order-preview>
                    @endforeach
                </div>
            </section>
        </div>
    </section>
@stop
