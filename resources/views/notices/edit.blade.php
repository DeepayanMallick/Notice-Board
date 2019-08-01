@extends('layouts.app')

@section('content')
    <h1>Update Notice</h1> 
    {{ Form::open(['action' => ['NoticesController@update', $notice->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
        <div class="form-gourp">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $notice->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
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
            {{Form::textarea('body', $notice->body, ['class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        {{ Form::hidden('_method','PUT') }}
        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
	{{ Form::close() }}
@endsection