@extends ('mail.mailmaster')

@section('body')

    <h1>Ihre Bestellung ist eingegangen</h1>
    <p>Hiermit möchten wir Ihnen mitteilen, dass Ihre Bestellung erfolgreich eingegangen ist.</p>

    <p>Ihre bestellten Produkte: </p>
    @foreach($products as $product)
    <p>{{$product['item']['name']}}</p>
    @endforeach
@endsection