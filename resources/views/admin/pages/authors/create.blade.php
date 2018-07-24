@extends('admin.pages.author-form')

@section('desktop-headline')
    anlegen
@endsection

@section('mobile-headline')
    Autor anlegen
@endsection

@section('action'){{route('admin.author.store')}}@stop

@section('firstname', old('firstname'))
@section('lastname', old('lastname'))


