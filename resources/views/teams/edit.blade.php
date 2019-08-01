@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
    <h1>Update Team</h1> 
    {{ Form::open(['action' => ['TeamsController@update', $team->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
        <div class="form-gourp">
            {{Form::label('team_name', 'Team Name')}}
            {{Form::text('team_name', $team->team_name, ['class' => 'form-control', 'placeholder' => 'Team Name'])}}
        </div>
        <div class="form-gourp">
            {{Form::label('team_id', 'Team id')}}
            {{Form::text('team_id', $team->team_id, ['class' => 'form-control', 'placeholder' => 'Team id'])}}
        </div>
        {{ Form::hidden('_method','PUT') }}
        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}  
    </div>



</div>

@endsection