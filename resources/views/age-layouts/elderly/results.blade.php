@extends ('age-layouts.elderly')

@section('title', 'Suchergebnisse' )

@section('main')
    @if(!session('results'))
        <section class="fullscreen-white-background flex-center">
            @if(session('status'))
                <p class="empty-error">{{session('status')}}</p>
            @endif

            @if(empty(session('status')) && empty(session('results')))
                <p class="empty-error">Bitte geben Sie einen Suchbegriff ein.</p>
            @endif
        </section>

    @else
        <section class="fullscreen-white-background">
            <h2 class="margin-top-bottom">Suchergebnisse</h2>
            <div class="grid-x">
                @foreach (session('results') as $result)
                    <book-preview key="{{$result->id}}"
                                  title="{{$result->name}}"
                                  price="{{$result->price}}"
                                  img="{{$result->image[0]->img}}"
                                  id="{{$result->id}}"
                                  size="1"
                    ></book-preview>
                @endforeach
            </div>
        </section>
    @endif
@stop