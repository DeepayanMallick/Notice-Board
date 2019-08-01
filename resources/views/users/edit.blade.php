@extends('layouts.app')

@section('content')
<div class="container">
        <div class="justify-content-center">
        <h1>Select Team For User</h1> 
        <h5>User Name: {{ $user->name }}</h5>
        <h5>Email: {{ $user->email }}</h5>
        {{ Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="form-gourp">
                <select class="form-control" name="team_id">
                    <option value="">Select Team</option>
                @foreach($teams as $team)
                    <option value="{{ $team->team_id }}">{{ $team->team_name }}</option>
                    @endforeach
                </select>
            </div>
            {{ Form::hidden('_method','PUT') }}
            {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}    
        </div>
    </div>

</div>

@endsection