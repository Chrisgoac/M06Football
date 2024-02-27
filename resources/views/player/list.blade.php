@extends('layout')
 
@section('content')
 
@if(empty($players))
    <p>There are no players!</p>
@else
    <ul>
    @foreach($players as $player)
        <li><a href="/player/{{ $player->id }}">{{ $player->name }} {{ $player->surname }}</a></li>
    @endforeach
    </ul>     
@endif
 
@endsection