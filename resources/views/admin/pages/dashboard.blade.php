@extends ('admin.admin')

@section('title', 'Dashboard' )

@section('main')

    <section class="fullscreen-beige-background admin-fullscreen grid-x flex-center">

        <h2>Admin-Dashboard</h2>

        <div class="dashboard-menu logout">
            <a class="dashboard-link grid-x flex-center" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="cell small-2 flex-center">
                    <feather-logout></feather-logout>
                </div>
                <p class="dashboard-regular cell small-10">Abmelden</p>
            </a>

            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </section>

@stop