@extends ('age-layouts.kids')

@section('title', 'Kategorie' )

@section('main')
    <div>
        @if (Session::has('genreId'))
            <h2>{{$genre->genre}}</h2>
        @else
            <h2>{{$category->name}}</h2>
        @endif

        <filter-category
                :category-genres="{{$genres}}"
                :category-authors="{{$authors}}"
                :category-id="{{$category->id}}"
                :size="1.25"
                @filter="filterGenre"
                @nofilter="noFilter"
        ></filter-category>

        <kids-preview
                :category-id="{{$category->id}}"
                :fontsize="1.25"
                :parent-products="products"
                @update="updateProducts"
        ></kids-preview>
    </div>
@stop