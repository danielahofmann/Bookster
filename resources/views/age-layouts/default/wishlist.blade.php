@extends ('age-layouts.default')

@section('title', 'Wunschliste' )

@section('main')

    @if(Session::has('wishlist'))

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

    @endif

@stop