@extends ('age-layouts.default')

@section('title', 'Kategorie' )

@section('main')
    <book
            :data="{{ $product[0] }}"
            :book-id="{{ $product[0]->id }}"
    ></book>

    <h2>Aktuelle Bestseller</h2>
    <book-carousel
            :books-for-kids="false"
    ></book-carousel>
@stop