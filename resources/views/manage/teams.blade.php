@extends('layout')
 
@section('content')
<h2>Manage teams</h2>
<p>An applicacion made with Laravel framework</p>

<ul>
    <li><a href="/team/add">Add team</a></li>
</ul>

@if(session('message'))
    <p>{{session('message')}}</p>
@endif

<h2>All teams: </h2>
@if(empty($teams))
    <p>There are no teams to display</p>
@else
    <p>Total: {{ count($teams) }}</p>
    <table>
        <tr>
            <th>Name</th>
            <th>Stadium</th>
            <th>Members number</th>
            <th>Actions</th>
        </tr>
        @foreach($teams as $team)
            <tr>
                <td>{{ $team->name }}</td>
                <td>{{ $team->stadium }}</td>
                <td>{{ $team->numMembers }}</td>
                <td>
                    <a href="/edit/team/{{ $team->id }}">Modify</a> - 
                    <a href="#" onclick="confirmDelete('{{ $team->id }}')">Erase</a>
                    <form id="delete-form-{{ $team->id }}" action="/delete/team/{{ $team->id }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </td>
            </tr>
        @endforeach    
    </table>
    <script>
        function confirmDelete(teamId) {
            if (confirm('Are you sure you want to delete this player?')) {
                event.preventDefault();
                document.getElementById('delete-form-' + teamId).submit();
            }
        }
    </script>
@endif

@endsection