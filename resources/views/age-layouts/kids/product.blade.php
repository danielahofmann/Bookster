@extends ('age-layouts.kids')

@section('title', 'Kategorie' )

@section('main')
    <toddler-book
            :data="{{ $product[0] }}"
            :book-id="{{ $product[0]->id }}"
            class="margin-top-desktop"
    ></toddler-book>

    <h2>Ähnliche Bücher</h2>
    <book-carousel
            :books-for-kids="true"
    ></book-carousel>
@stop