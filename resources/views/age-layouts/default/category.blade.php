@extends ('age-layouts.default')

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
            :size="1"
        ></filter-category>

        <book-preview-section
            :category-id="{{$category->id}}"
            :fontsize="1"
        ></book-preview-section>
    </div>
@stop