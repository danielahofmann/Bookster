@extends ('age-layouts.seniors')

@section('title', 'Kategorie' )

@section('main')
    <div>
        {{ Breadcrumbs::render('seniors-category', $category->name, $category->id) }}

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

        <book-preview-section
                :category-id="{{$category->id}}"
                :fontsize="1.25"
                :parent-products="products"
                @update="updateProducts"
        ></book-preview-section>
    </div>
@stop