@extends('layout')
 
@section('content')
 
<h2>Add a new player</h2>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="/player/add">
    @csrf
    <div class="form-group">
        <input name="name" type="text" placeholder="Name..." class="form-control">{{old('name')}}</input>
        <input name="surname" type="text" placeholder="Surname..." class="form-control">{{old('surname')}}</input>
    </div>
    <div class="form-group">
        <input name="position" type="text" placeholder="Position..." class="form-control">{{old('position')}}</input>
        <input name="salary" type="text" placeholder="Salary..." class="form-control">{{old('salary')}}</input>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add player</button>
    </div>
</form>
<a href="/manage/players">Cancel</button>

 
@endsection