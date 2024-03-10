@extends('layout')

@section('content')
    <h2>Enroll Player to Team: {{ $team->name }}</h2>
    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif
    <!-- Display confirmation message -->
    @if (session('confirmation'))
        <div class="confirmation">
            <p>{{ session('confirmation') }}</p>
            <form method="post" action="/confirmenroll/player/{{ session('player_id') }}/{{ session('team_id') }}">
                @csrf
                <input type="hidden" name="player_id" value="{{ session('player_id') }}">
                <input type="hidden" name="team_id" value="{{ session('team_id') }}">
                <button type="submit" class="btn btn-primary">Confirm</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Actual team</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($players as $playerItem)
                <tr>
                    <td>{{ $playerItem->name }}</td>
                    <td>{{ $playerItem->surname }}</td>
                    <td>{{ $playerItem->team ? $playerItem->team->name : 'Sin equipo' }}</td>
                    <td>
                        <form method="post" action="/enroll/player/{{ $playerItem->id }}/{{ $team->id }}">
                            @csrf
                            <input type="hidden" name="team_id" value="{{ $team->id }}">
                            <button type="submit" class="btn btn-primary">Inscribir a {{ $team->name }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>    
@endsection
