@extends ('layouts.master')

@section('pageTitle')
    <title>{{ config('app.name', 'Bookster') }} - Suchergebnisse</title>
@stop

@section('body')
    <h1>Suchergebnisse</h1>

    @if (session('results'))
        @foreach (session('results') as $result)
        <div>
            {{ $result->name }} </br>
            {{ $result->description }}</br>
            {{ $result->price }}</br>
            {{ $result->author->firstname }}</br>
            <hr>
        </div>
        @endforeach
    @endif

@stop