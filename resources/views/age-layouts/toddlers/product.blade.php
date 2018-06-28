@extends ('age-layouts.toddlers')

@section('title', 'Kategorie' )

@section('main')
    <toddler-book
        :data="{{ $product[0] }}"
        :book-id="{{ $product[0]->id }}"
    ></toddler-book>
@stop