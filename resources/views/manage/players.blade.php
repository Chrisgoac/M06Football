@extends('layout')
 
@section('content')
<h2>Manage players</h2>
<p>An applicacion made with Laravel framework</p>

<ul>
    <li><a href="/player/add">Add player</a></li>
</ul>
@if(session('message'))
    <p>{{session('message')}}</p>
@endif

<h2>All players: </h2>
@if(empty($players))
    <p>There are no players to display</p>
@else
    <p>Total: {{ count($players) }}</p>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Last name</th>
                <th>Position</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($players as $player)
                <tr>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->surname }}</td>
                    <td>{{ $player->position }}</td>
                    <td>
                        <a class="btn btn-primary" href="/edit/player/{{ $player->id }}">Modify</a> - 
                        <a class="btn btn-secondary" href="#" onclick="confirmDelete('{{ $player->id }}')">Erase</a>
                        <form id="delete-form-{{ $player->id }}" action="/delete/player/{{ $player->id }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>
    <script>
        function confirmDelete(playerId) {
            if (confirm('Are you sure you want to delete this player?')) {
                event.preventDefault();
                document.getElementById('delete-form-' + playerId).submit();
            }
        }
    </script>
@endif
@endsection