@extends ('admin.admin')

@section('title', 'Charaktere' )

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
                        :character-view="true"
                        token="{!! csrf_token() !!}"
                        class="display-mobile-none"
                ></admin-dashboard-menu>

                <div class="cell small-12 medium-6 large-8 no-margin-mobile">

                    <div class="dashboard-headline display-mobile-none grid-x">
                        <div class="cell small-12">
                            <feather-github></feather-github>
                        </div>
                        <h2 class="cell medium-7 large-10">Charaktere</h2>
                        <div class="cell medium-5 large-2">
                            <a href="{{route('admin.character.create')}}">
                                <button class="order-button margin-top-1 full-width text-center display-none-tablet">hinzufügen</button>
                            </a>
                        </div>
                    </div>

                    <admin-mobile-redirect
                            headline="Charaktere"
                    ></admin-mobile-redirect>

                    <a href="{{route('admin.character.create')}}">
                        <button class="cell small-6 display-tablet order-button mobile-button-white full-width text-center">hinzufügen</button>
                    </a>

                    @if($characters->count() > 0)
                    <div class="grid-x">
                        @foreach($characters as $character)
                            <div class="cell small-12 medium-12 large-4">
                                <div class="order-details margin-right-1">
                                    <img src="{{ asset('storage/character-image/' . $character->character_image->img) }}" alt="{{$character->name}}">
                                    <p class="headline height-50px">{{$character->name}}</p>
                                    <a href="{{route('admin.character.edit', $character->id)}}">
                                        <button class="order-button margin-top-1 full-width text-center">
                                            bearbeiten
                                        </button>
                                    </a>
                                    <a href="{{route('admin.character.delete-form', $character->id)}}">
                                        <button class="order-button margin-top-1 full-width text-center">
                                            löschen
                                        </button>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </section>
        </div>
    </section>
@stop
