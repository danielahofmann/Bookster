@extends ('age-layouts.elderly')

@section('title', 'Startseite' )

@section('main')
    <slider></slider>

    <opening
            size="1.5"
            size-text="1"
    ></opening>

    <manual
            size-headline="1.5"
            size-text="1"></manual>

    <h2>Aktuelle Bestseller</h2>
    <book-carousel></book-carousel>

    <section class="grid-x flex-center">
        <span class="cell small-0 medium-1"></span>
        <h2 class="cell small-12 medium-7 text-left display-none-tablet" style="padding:0 0 40px 0">Neuheiten</h2>
        <h2 class="cell small-12 medium-3 text-left display-none-tablet" style="padding:0 0 40px 40px">Autoren</h2>
        <span class="cell small-0 medium-1"></span>
        <novelties class="cell small-12 medium-12 large-7"></novelties>
        <authors-list class="cell small-12 medium-12 large-3"></authors-list>
    </section>
@stop