@extends ('age-layouts.default')

@section('title', 'Startseite' )

@section('main')
    <slider></slider>

    <opening
        size="1.5"
        size-text="1"
    ></opening>

    <manual
    size-headline="1.25"
    size-text="1"></manual>

    <h2>Aktuelle Bestseller</h2>
    <book-carousel></book-carousel>

    <section class="grid-x flex-center">
        <novelties class="cell small-12 medium-7"></novelties>
        <authors-list class="cell small-12 medium-3"></authors-list>
    </section>
@stop