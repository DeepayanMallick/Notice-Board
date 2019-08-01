@extends('layouts.app')

@section('content')
    <h1>Create Team</h1> 
    {{ Form::open(['action' => 'TeamsController@store', 'method' => 'POST']) }}
        <div class="form-gourp">
            {{Form::label('team_name', 'Team Name')}}
            {{Form::text('team_name', '', ['class' => 'form-control', 'placeholder' => 'Team Name'])}}
        </div>
        <div class="form-gourp">
            {{Form::label('team_id', 'Team ID')}}
            {{Form::text('team_id', '', ['class' => 'form-control', 'placeholder' => 'Team ID'])}}
        </div>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
	{{ Form::close() }}
@endsection