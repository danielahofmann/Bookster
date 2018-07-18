@extends ('mail.mailmaster')

@section('body')

    <h1>Bestellung bestätigen</h1>
    <p>Sehr geehrte Damen und Herren, hiermit möchten wir Sie darüber in Kenntniss setzen, dass eine Bestellung durch Ihr Kind in unserem Onlineshop getätigt wurde. Diese Bestellung wird erst dann rechtskräftig, wenn Sie diese über den unten stehenden Link bestätigen. Sollte es sich hierbei um einen Fehler handeln, ignorieren Sie bitte diese E-Mail. Bei weiteren Fragen können Sie gerne unseren Kundenservice kontaktieren.</p>

    <p>Die Bestellnummer lautet: {{$order_id}}</p>
    <a href="{{route('confirmation', $order_id)}}">Bestellung bestätigen</a>
@endsection