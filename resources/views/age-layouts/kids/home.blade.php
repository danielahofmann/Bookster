@extends ('age-layouts.kids')

@section('title', 'Startseite' )

@section('main')
    <slider></slider>

    <h2>Aktuelle Bestseller</h2>
    <book-carousel></book-carousel>

    <section class="grid-x flex-center">
        <h2 class="cell small-12 text-center" style="padding:0 0 40px 0">Neuheiten</h2>
        <kids-novelties></kids-novelties>
    </section>
@stop