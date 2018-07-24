@extends ('admin.admin')

@section('title', 'Autoren' )

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
                        :author-view="true"
                        token="{!! csrf_token() !!}"
                        class="display-mobile-none"
                ></admin-dashboard-menu>

                <div class="cell small-12 medium-6 large-8 no-margin-mobile">

                    <div class="dashboard-headline display-mobile-none grid-x">
                        <div class="cell small-12">
                            <feather-user></feather-user>
                        </div>
                        <h2 class="cell medium-7 large-10">Autoren</h2>
                        <div class="cell medium-5 large-2">
                            <a href="{{route('admin.author.create')}}">
                                <button class="order-button margin-top-1 full-width text-center display-none-tablet">hinzufügen</button>
                            </a>
                        </div>
                    </div>

                    <admin-mobile-redirect
                            headline="Autoren"
                    ></admin-mobile-redirect>

                    <a href="{{route('admin.author.create')}}">
                        <button class="cell small-6 display-tablet order-button mobile-button-white full-width text-center">hinzufügen</button>
                    </a>

                    <div class="grid-x">
                        @foreach($authors as $author)
                            <div class="cell small-12 medium-12 large-4">
                                <div class="order-details margin-right-1">
{{--
                                    <img src="{{ $author->author_image->img }}"
--}}
                                    <img src="{{ asset('storage/author-image/' . $author->author_image->img) }}"
                                         alt="{{$author->name}}">
                                    <p class="headline text-center">{{$author->firstname}} {{$author->lastname}}</p>
                                    <a href="{{route('admin.author.edit', $author->id)}}">
                                        <button class="order-button margin-top-1 full-width text-center">
                                            bearbeiten
                                        </button>
                                    </a>
                                    <a href="{{route('admin.author.delete-form', $author->id)}}">
                                        <button class="order-button margin-top-1 full-width text-center">
                                            löschen
                                        </button>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </section>
@stop
