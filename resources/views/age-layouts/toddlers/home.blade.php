@extends ('age-layouts.toddlers')

@section('title', 'Startseite' )

@section('main')
    <toddler-carousel></toddler-carousel>

    <section class="grid-x flex-center">
        <kids-novelties
                :url="'toddlers-product'"
        ></kids-novelties>
    </section>
@stop