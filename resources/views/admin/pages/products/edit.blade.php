@extends('admin.pages.product-form')

@section('desktop-headline')
    - {{$product->name}}
@endsection

@section('mobile-headline')
    {{$product->name}}
@endsection

@section('action'){{route('admin.product.update', $product->id)}}@stop

@section('method')
    {{ method_field('PATCH') }}
@endsection

@section('name', $product->name)
@section('price', $product->price)
@section('description', $product->description)
@section('amount', $product->amount)
@section('release', $product->release)

@section('category')
    @foreach ($categories as $category)
        <option value="{{$category->id}}" {{$product->category->id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
    @endforeach
@endsection

@section('genre')
    @foreach ($genres as $genre)
        <option value="{{$genre->id}}" {{$product->genre->id == $genre->id ? 'selected' : ''}}>{{$genre->genre}}</option>
    @endforeach
@endsection

@section('author')
    @foreach ($authors as $author)
        <option value="{{$author->id}}" {{$product->author->id == $author->id ? 'selected' : ''}}>{{$author->firstname}} {{$author->lastname}}</option>
    @endforeach
@endsection

@section('character')
    @foreach ($characters as $character)
        @if(!empty($product->character))
            <option value="{{$character->id}}" {{$product->character->id == $character->id ? 'selected' : ''}}>{{$character->name}}</option>
        @else
            <option value="{{$character->id}}">{{$character->name}}</option>
        @endif
    @endforeach
@endsection

