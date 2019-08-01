@extends('layouts.app')

@section('content')
    <div class="container">

        <a href="/notices" class="btn btn-default">Go back</a>
        <h4>{{ $notice->title }}</h4>
        <h5>Notice for team {{ $notice->team->team_name }}</h5>
        <div>
            {{ $notice->body }}
        </div>
        <small>Written on {{$notice->created_at}}</small> 
        <a href="/notices/{{$notice->id}}/edit" class="btn btn-default">Edit</a>
        {!!Form::open(['action' => ['NoticesController@destroy', $notice->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
    </div>

@endsection