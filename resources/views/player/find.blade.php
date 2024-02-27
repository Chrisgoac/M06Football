@extends('layout')
 
@section('content')
 
@if(empty($player))
    <p>There are no player!</p>
@else
    <form>
        <input type="text" readonly value="{{ $player->name }}"> <br> <br>
        <input type="text" readonly value="{{ $player->surname }}"> <br> <br>
        <input type="text" readonly value="{{ $player->position }}"> <br> <br>
        <input type="text" readonly value="{{ $player->salary }}"> <br> <br>
        <input type="text" readonly value="{{ $player->team->name }}"> <br> <br>
    </form>
@endif

@endsection