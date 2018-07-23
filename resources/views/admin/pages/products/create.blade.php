@extends('admin.pages.product-form')

@section('desktop-headline')
    anlegen
@endsection

@section('mobile-headline')
    Produkt anlegen
@endsection

@section('action'){{route('admin.product.store')}}@stop

@section('name', old('name'))
@section('price', old('price'))
@section('description', old('description'))
@section('amount', old('amount'))
@section('release', old('release'))

@section('category')
    @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
@endsection

@section('genre')
    @foreach ($genres as $genre)
        <option value="{{$genre->id}}">{{$genre->genre}}</option>
    @endforeach
@endsection

@section('author')
    @foreach ($authors as $author)
        <option value="{{$author->id}}">{{$author->firstname}} {{$author->lastname}}</option>
    @endforeach
@endsection

@section('character')
    @foreach ($characters as $character)
            <option value="{{$character->id}}">{{$character->name}}</option>
    @endforeach
@endsection


