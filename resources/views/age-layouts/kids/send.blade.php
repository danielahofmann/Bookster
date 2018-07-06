@extends ('age-layouts.kids')

@section('title', 'Wunschliste senden' )

@section('main')
    <div class="grid-container margin-top-kids">
        <h2>Versende deine Wunschliste</h2>

        <div class="grid-x flex-center">
            <form action="/sendWishlist" method="post" class="small-6">
                {{ csrf_field() }}
                <input type="email" class="input" name="email" id="email"
                       placeholder="E-Mail-Adresse deiner Eltern" required>

                <div class="grid-x flex-center">
                    <button type="submit" class="button" id="submit">Jetzt versenden</button>
                </div>
            </form>
        </div>
    </div>
@stop