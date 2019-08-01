@extends('layouts.app')

@section('content')
    <h1>Create Notice</h1> 
    {{ Form::open(['action' => 'NoticesController@store', 'method' => 'POST']) }}
        <div class="form-gourp">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-gourp">
            <select class="form-control" name="team_id">
                <option value="">Select Team</option>
            @foreach($teams as $team)
                <option value="{{ $team->team_id }}">{{ $team->team_name }}</option>
            @endforeach
            </select>
        </div>

        <div class="form-gourp">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
	{{ Form::close() }}
@endsection