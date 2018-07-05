@extends ('age-layouts.default')

@section('title', 'Wunschliste' )

@section('main')

    @if(!empty($products))

        <section class="grid-container">
            <div class="grid-x">
                @foreach($products as $product)
                    <book-preview key="{{$product['item']['id']}}"
                                  title="{{$product['item']['name']}}"
                                  price="{{$product['item']['price']}}"
                                  img="{{$product['item']['image'][0]['img']}}"
                                  id="{{$product['item']['id']}}"
                                  size="1"
                                  wishlist-saved="true"
                                  show-button="true"
                    ></book-preview>
                @endforeach
            </div>
        </section>
    @else
        <section class="grid-y" style="height: 35vh">
            <div class="grid-x flex-center">
                <p class="cell small-6 medium-cell-block placeholder">Sie haben noch keine Produkte in Ihrer Wunschliste gespeichert.</p>
            </div>
        </section>

    @endif

@stop