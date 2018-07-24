@extends('admin.pages.character-form')

@section('desktop-headline')
    - {{$character->name}}
@endsection

@section('mobile-headline')
    {{$character->name}}
@endsection

@section('action'){{route('admin.character.update', $character->id)}}@stop

@section('name', $character->name)


