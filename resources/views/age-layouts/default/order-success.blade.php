@extends ('age-layouts.default')

@section('title', 'Bestellung erfolgreich' )

@section('main')
    @if(session('status'))
        <p>{{session('status')}}</p>
    @endif

@endsection
