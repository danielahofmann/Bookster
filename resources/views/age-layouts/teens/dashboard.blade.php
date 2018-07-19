@extends ('age-layouts.teens')

@section('title', 'Dashboard' )

@section('main')
    <div class="beige">
        <div class="grid-container beige no-padding-mobile">
            <section class="fullscreen-beige-background grid-x grid-margin-x no-margin-mobile no-padding-mobile">
                <div class="cell small-12 medium-6 large-8 display-mobile-only no-margin-mobile">
                    <img src="/img/dashboard-welcome.png" alt="Willkommen im Dashboard" class="dashboard-image">
                </div>

                @php($firstchar =  substr($customer->firstname, 0, 1))
                @php($scndchar =  substr($customer->lastname, 0, 1))

                <dashboard-menu
                        :customer-data="{{$customer}}"
                        firstchar="{{$firstchar}}"
                        scndchar="{{$scndchar}}"
                        :overview-template="true"
                        token="{!! csrf_token() !!}"
                        :path-user="'teens-dashboard-user'"
                        :path-order="'teens-dashboard-order'"
                        :path-start="'teens-dashboard'"
                ></dashboard-menu>

                <div class="cell small-12 medium-6 large-8 display-mobile-none">
                    <img src="/img/dashboard-welcome.png" alt="Willkommen im Dashboard" class="dashboard-image">
                </div>
            </section>
        </div>
    </div>
@stop