@extends ('age-layouts.default')

@section('title', 'Kategorie' )

@section('main')
    <div class="breadcrumb breadcrumb-margin-top">
        {{ Breadcrumbs::render('default-product', $product[0]->name, $product[0]->id, $product[0]->category_id, $product[0]->category->name)}}
    </div>

    <book
            :data="{{ $product[0] }}"
            :book-id="{{ $product[0]->id }}"
    ></book>

    <h2>Aktuelle Bestseller</h2>
    <book-carousel
            :books-for-kids="false"
    ></book-carousel>
@stop