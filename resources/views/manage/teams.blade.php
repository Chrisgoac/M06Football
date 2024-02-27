@extends('layout')
 
@section('content')
<h2>Manage teams</h2>
<p>An applicacion made with Laravel framework</p>

<ul>
    <li><a href="/team/add">Add team</a></li>
</ul>

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
                <td><a href="/team/modify/{{ $team->id }}">Modify</a> - <a href="/team/erase/{{ $team->id }}">Erase</a></td>
            </tr>
        @endforeach    
    </table>
@endif

@endsection