@component('mail::message')
# Ihr Bestellung ist eingegangen!

Hiermit möchten wir Ihnen mitteilen, dass Ihre Bestellung erfolgreich bei uns eingegangen ist und nun bearbeitet wird.

# Folgende Produkte haben Sie bestellt:


@foreach($order as $item)
    {{$item['item']['name']}}
    {{$item['item']['author']['firstname'] }} {{ $item['item']['author']['lastname'] }}
    {{$item['item']['price']}} €
    @endforeach


Vielen Dank, <br>
    Ihr bookster-Team
@endcomponent
