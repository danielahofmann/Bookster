@extends ('age-layouts.toddlers')

@section('title', 'Kategorie' )

@section('main')
    <div>
        <h2>{{$category->name}}</h2>

        <filter-category
                :category-genres="{{$genres}}"
                :category-authors="{{$authors}}"
                :category-id="{{$category->id}}"
                :size="0.75"
                @filter="filterGenre"
                @nofilter="noFilter"
        ></filter-category>

        <book-preview-section
                :category-id="{{$category->id}}"
                :fontsize="1"
                :parent-products="products"
                @update="updateProducts"
        ></book-preview-section>
    </div>
@stop