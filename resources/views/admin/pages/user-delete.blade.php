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
                        :user-view="true"
                        token="{!! csrf_token() !!}"
                        class="display-mobile-none"
                ></admin-dashboard-menu>

                <div class="cell small-12 medium-6 large-8 no-margin-mobile">

                    <div class="dashboard-headline display-mobile-none">
                        <div>
                            <feather-users></feather-users>
                        </div>
                        <h2>Mitarbeiter löschen</h2>
                    </div>

                    <admin-mobile-redirect
                            headline="Mitarbeiter löschen"
                    ></admin-mobile-redirect>

                    <div class="order-details grid-x">
                        <div class="cell small-10">
                            <p>{{$employee->firstname}} {{$employee->lastname}}</p>
                            <p>{{$employee->email}}</p>
                            <p>Rolle: {{$employee->role == 1 ? 'Administrator' : 'Mitarbeiter'}}</p>
                        </div>
                    </div>

                    <div class="order-details">
                        <form action="{{ route('admin.user.delete', $employee->id) }}" method="POST" class="grid-x grid-margin-x">
                            {{ method_field('DELETE') }}
                            @csrf

                            <p class="text-modal">Bitte bedenken Sie, dass das Löschen nicht mehr rückgängig gemacht werden kann. Bei Fragen wenden Sie sich bitte an einen Vorgesetzten.</p>

                            <button type="submit" class="submit-button">Mitarbeiter löschen</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </section>
@stop
