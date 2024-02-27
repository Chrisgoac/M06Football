@extends('layout')
 
@section('content')
<h2>Manage players</h2>
<p>An applicacion made with Laravel framework</p>

<ul>
    <li><a href="/player/add">Add player</a></li>
</ul>

<h2>All players: </h2>
@if(empty($players))
    <p>There are no players to display</p>
@else
    <p>Total: {{ count($players) }}</p>
    <table>
        <tr>
            <th>Name</th>
            <th>Last name</th>
            <th>Position</th>
            <th>Actions</th>
        </tr>
        @foreach($players as $player)
            <tr>
                <td>{{ $player->name }}</td>
                <td>{{ $player->surname }}</td>
                <td>{{ $player->position }}</td>
                <td><a href="/player/modify/{{ $player->id }}">Modify</a> - <a href="/player/erase/{{ $player->id }}">Erase</a></td>
            </tr>
        @endforeach    
    </table>
@endif
@endsection