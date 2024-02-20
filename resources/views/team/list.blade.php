@extends('layout')
 
@section('content')
 
@if(empty($teams))
    <p>There are no teams!</p>
@else
    <ul>
    @foreach($teams as $team)
        <li><a href="/team/{{ $team->id }}">{{ $team->name }}</a></li>
    @endforeach
    </ul>     
@endif
 
@endsection