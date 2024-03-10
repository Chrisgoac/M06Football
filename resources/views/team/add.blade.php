@extends('layout')
 
@section('content')
 
<h2>Add a new team</h2>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="/team/add">
    @csrf
    <div class="form-group">
        <input name="name" type="text" placeholder="Name..." class="form-control" value="{{old('name')}}"></input>
        <input name="stadium" type="text" placeholder="Stadium..." class="form-control" value="{{old('stadium')}}"></input>
        <input name="numMembers" type="text" placeholder="Num of members..." class="form-control" value="{{old('numMembers')}}"></input>
        <input name="budget" type="text" placeholder="Budget..." class="form-control" value="{{old('budget')}}"></input>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add team</button>
    </div>
</form>
<a href="/manage/teams">Cancel</button>

 
@endsection