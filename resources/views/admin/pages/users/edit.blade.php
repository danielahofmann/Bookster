@extends('admin.pages.user-form')

@section('desktop-headline')
    - {{$employee->firstname}} {{$employee->lastname}}
@endsection

@section('mobile-headline')
    {{$employee->firstname}} {{$employee->lastname}}
@endsection

@section('action'){{route('admin.user.update', $employee->id)}}@stop

@section('firstname', $employee->firstname)
@section('lastname', $employee->lastname)
@section('email', $employee->email)
@section('role-1')
{{$employee->role == 1 ? 'selected' : ''}}
    @endsection

@section('role-3')
    {{$employee->role == 3 ? 'selected' : ''}}
@endsection
