@extends ('age-layouts.toddlers')

@section('title', 'Kategorie' )

@section('main')
    <toddler-character
        :this-character="{{$character}}"
    ></toddler-character>

    <toddler-character-books
            :character-products="{{$products}}"
    ></toddler-character-books>
@stop