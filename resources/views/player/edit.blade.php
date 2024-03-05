@extends('layout')
 
@section('content')
 
@if(empty($player))
    <p>There are no players!</p>
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

    <h2>Edit a player</h2>
    <form method="post" action="/edit/player/{{$player->id}}">
        @csrf
        <div class="form-group">
            <input name="id" type="text" readonly class="form-control" value="{{$player->id}}"></input>
        </div>
        <div class="form-group">
            <input name="name" type="text" class="form-control" value="{{$player->name}}"></input>
            <input name="surname" type="text" class="form-control" value="{{$player->surname}}"></input>
        </div>
        <div class="form-group">
            <input name="position" type="text" class="form-control" value="{{$player->position}}"></input>
            <input name="salary" type="text" class="form-control" value="{{$player->salary}}"></input>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Edit player</button>
        </div>
    </form>
@endif

<a href="/manage/players">Cancel</button>

@endsection