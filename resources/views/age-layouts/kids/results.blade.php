@extends ('age-layouts.kids')

@section('title', 'Suchergebnisse' )

@section('main')
    @if(!session('results'))
        <section class="fullscreen-white-background flex-center">
            @if(session('status'))
                <p class="empty-error">{{session('status')}}</p>
            @endif

            @if(empty(session('status')) && empty(session('results')))
                <p class="empty-error">Bitte gib einen Suchbegriff ein.</p>
            @endif
        </section>

    @else
        <section class="fullscreen-white-background padding-top-seniors">
            <h2 class="margin-top-bottom">Suchergebnisse</h2>
            <div class="grid-x">
                @foreach (session('results') as $result)
                    <kids-book-preview class="cell small-6 medium-3 large-2"
                                       key="{{$result->id}}"
                                       img="{{$result->image[0]->img}}"
                                       book-id="{{$result->id}}"
                    ></kids-book-preview>
                @endforeach
            </div>
        </section>
    @endif
@stop