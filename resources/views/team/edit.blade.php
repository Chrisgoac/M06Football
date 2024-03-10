@extends('layout')
 
@section('content')
 
@if(empty($team))
    <p>There are no teams!</p>
@else

    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('message'))
        <p>{{session('message')}}</p>
    @endif

    <h2>Edit Team: {{ $team->name }}</h2>
    <form method="post" action="/edit/team/{{ $team->id }}">
        @csrf
        <div class="form-group">
            <input name="id" type="text" readonly class="form-control" value="{{ $team->id }}">
        </div>
        <div class="form-group">
            <input name="name" type="text" class="form-control" value="{{ $team->name }}">
            <input name="stadium" type="text" class="form-control" value="{{ $team->stadium }}">
        </div>
        <div class="form-group">
            <input name="numMembers" type="text" class="form-control" value="{{ $team->numMembers }}">
            <input name="budget" type="text" class="form-control" value="{{ $team->budget }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Edit Team</button>
        </div>
    </form>

    <h3>List of players on the team ({{ count($team->players) }})</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($team->players as $player)
                <tr>
                    <td>{{ $player->name }}</td>
                    <td>{{ $player->position }}</td>
                    <td>
                        <form method="post" action="/player/unenrol/{{$player->id}}">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-danger">Unenroll</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/enroll/player/{{$team->id}}" class="btn btn-primary">Enroll New Player</a>
    <a href="/manage/teams" class="btn btn-secondary">Cancel</a>

@endif

@endsection
