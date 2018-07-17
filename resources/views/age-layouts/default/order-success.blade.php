@if(session('status'))
    <p>{{session('status')}}</p>
@endif

@if(session('request'))
    <p>{{session('request')}}</p>
@endif