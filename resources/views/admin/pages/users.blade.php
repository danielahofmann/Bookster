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
                        <h2>Mitarbeiter</h2>
                    </div>

                    <admin-mobile-redirect
                            headline="Mitarbeiter"
                    ></admin-mobile-redirect>

                    @foreach($employees as $employee)
                        <div class="order-details grid-x">
                            <div class="cell small-10">
                                <p>{{$employee->firstname}} {{$employee->lastname}}</p>
                                <p>{{$employee->email}}</p>
                                <p>Rolle: {{$employee->role == 1 ? 'Administrator' : 'Mitarbeiter'}}</p>
                            </div>
                            <div class="cell small-2">
                                <a href="{{route('admin.user', $employee->id)}}">
                                    <button class="order-button margin-top-1 full-width text-center" type="button" data-open="editEmployeeModal">bearbeiten</button>
                                </a>
                                <button class="order-button margin-top-1 full-width text-center" type="button" data-open="deleteEmployeeModal">löschen</button>
                            </div>
                        </div>
                    @endforeach

                </div>
            </section>
        </div>
    </section>
@stop
