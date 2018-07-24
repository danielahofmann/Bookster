@extends('admin.pages.author-form')

@section('desktop-headline')
    - {{$author->firstname}} {{$author->lastname}}
@endsection

@section('mobile-headline')
    {{$author->firstname}} {{$author->lastname}}
@endsection

@section('action'){{route('admin.author.update', $author->id)}}@stop

@section('firstname', $author->firstname)
@section('lastname', $author->lastname)


