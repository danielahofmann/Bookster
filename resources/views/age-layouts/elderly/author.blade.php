@extends ('age-layouts.elderly')

@section('title', 'Kategorie' )

@section('main')
    <div>
        <h2>{{$author->firstname}} {{$author->lastname}}</h2>

        <section class="grid-container">
            <div class="grid-x">
                @foreach($products as $product)
                    <book-preview key="{{$product->id}}"
                                  title="{{$product->name}}"
                                  price="{{$product->price}}"
                                  img="{{$product->image[0]->img}}"
                                  id="{{$product->id}}"
                                  size="1"
                    ></book-preview>
                @endforeach
            </div>
        </section>
    </div>
@stop