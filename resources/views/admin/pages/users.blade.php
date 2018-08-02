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

                    <div class="dashboard-headline display-mobile-none grid-x">
                        <div class="cell small-12">
                            <feather-users></feather-users>
                        </div>
                        <h2 class="cell medium-8 large-10">Mitarbeiter</h2>

                        @if($user->role == 1)
                        <div class="cell medium-4 large-2">
                            <a href="{{route('admin.user.create')}}">
                                <button class="order-button margin-top-1 full-width text-center display-none-tablet">hinzufügen</button>
                            </a>
                        </div>
                        @endif
                    </div>

                    <admin-mobile-redirect
                            headline="Mitarbeiter"
                    ></admin-mobile-redirect>

                    @if($user->role == 1)
                    <a href="{{route('admin.user.create')}}">
                        <button class="cell small-6 display-tablet order-button mobile-button-white full-width text-center">hinzufügen</button>
                    </a>
                    @endif

                    @if($employees->count() > 0)
                        @foreach($employees as $employee)
                            <div class="order-details grid-x">
                                <div class="cell small-12 medium-12 large-10">
                                    <p>{{$employee->firstname}} {{$employee->lastname}}</p>
                                    <p>{{$employee->email}}</p>
                                    <p>Rolle: {{$employee->role == 1 ? 'Administrator' : 'Mitarbeiter'}}</p>
                                </div>

                                {{--only users with role 1 should be able to see those buttons--}}
                                @if($user->role == 1)
                                <div class="cell small-12 medium-12 large-2">
                                    <a href="{{route('admin.user.edit', $employee->id)}}">
                                        <button class="order-button margin-top-1 full-width text-center">bearbeiten</button>
                                    </a>
                                    <a href="{{route('admin.user.delete-form', $employee->id)}}">
                                        <button class="order-button margin-top-1 full-width text-center">löschen</button>
                                    </a>
                                </div>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
            </section>
        </div>
    </section>
@stop
