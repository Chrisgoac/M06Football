@extends('layout')
 
@section('content')
 
@if(empty($team))
    <p>There are no teams!</p>
@else
    
    <form>
        <input type="text" readonly value="{{ $team->name }}">
        <input type="text" readonly value="{{ $team->stadium }}">
        <input type="text" readonly value="{{ $team->numMembers }}">
        <input type="text" readonly value="{{ $team->budget }}"> <br> <br>
    </form>
@endif

@endsection