@extends ('age-layouts.default')

@section('title', 'Dashboard' )

@section('main')
    <div class="beige">
        <div class="grid-container beige no-padding-mobile">
            <section class="fullscreen-beige-background grid-x grid-margin-x no-margin-mobile no-padding-mobile">
                <div class="cell small-12 medium-6 large-8 display-mobile-only no-margin-mobile">
                    <img src="/img/dashboard-welcome.png" alt="Willkommen im Dashboard" class="dashboard-image">
                </div>

                <div class="cell small-12 medium-6 large-4">
                    <div class="welcome-user">
                        <p class="dashboard-initial">
                            @php($firstchar =  substr($customer->firstname, 0, 1))
                            @php($scndchar =  substr($customer->lastname, 0, 1))
                            {{$firstchar}}{{$scndchar}}
                        </p>
                        <div class="welcome-text">
                            <p class="dashboard-regular">Hallo,</p>
                            <p class="dashboard-bold">{{$customer->firstname}} {{$customer->lastname}}</p>
                        </div>
                    </div>
                    <div class="dashboard-menu border-left display-mobile-none">
                        <a class="dashboard-link grid-x flex-center">
                            <div class="cell small-2 flex-center">
                                <feather-user></feather-user>
                            </div>
                            <p class="dashboard-regular cell small-10">Kontoübersicht</p>
                        </a>
                    </div>
                    <div class="dashboard-menu">
                        <a class="dashboard-link grid-x flex-center">
                            <div class="cell small-2 flex-center">
                                <feather-package></feather-package>
                            </div>
                            <p class="dashboard-regular cell small-10">Meine Bestellungen</p>
                        </a>

                        <a class="dashboard-link grid-x flex-center">
                            <div class="cell small-2 flex-center">
                                <feather-settings></feather-settings>
                            </div>
                            <p class="dashboard-regular cell small-10">Meine Angaben</p>
                        </a>
                    </div>
                    <div class="dashboard-menu logout">
                        <a class="dashboard-link grid-x flex-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <div class="cell small-2 flex-center">
                                <feather-logout></feather-logout>
                            </div>
                            <p class="dashboard-regular cell small-10">Abmelden</p>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>

                <div class="cell small-12 medium-6 large-8 display-mobile-none">
                    <img src="/img/dashboard-welcome.png" alt="Willkommen im Dashboard" class="dashboard-image">
                </div>
            </section>
        </div>
    </div>
@stop