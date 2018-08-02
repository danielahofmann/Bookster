@component('mail::message')
#Eine neue Wunschliste!

Hallo,

Ihr Kind möchte Ihnen seine Wunschliste zukommen lassen. Auf dieser sind viele Produkte, die Ihrem Kind gefallen.

# Wunschliste:

@foreach($wishlist->items as $item)
    {{$item['item']['name']}}
    {{$item['item']['author']['firstname'] }} {{ $item['item']['author']['lastname'] }}
    {{$item['item']['price']}} €
@endforeach

Besuchen Sie unseren Shop, um die Produkte zu bestellen!
@component('mail::button', ['url' => $url])
Zum Shop
@endcomponent

Danke und viel Freude wünscht Ihnen,<br>
Ihr bookster-Team
@endcomponent
