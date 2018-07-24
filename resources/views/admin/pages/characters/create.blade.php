@extends('admin.pages.character-form')

@section('desktop-headline')
    anlegen
@endsection

@section('mobile-headline')
    Charakter anlegen
@endsection

@section('action'){{route('admin.character.store')}}@stop

@section('name', old('name'))
