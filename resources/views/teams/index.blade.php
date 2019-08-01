@extends('layouts.app')

{{-- @section('content')
    <h1>Teams</h1>
        @foreach ($teams as $team)
        <div class="card">
            <div class="card-body">
                <h5>Team Name: {{ $team->team_name }}</h5>
                <h5>Team ID: {{ $team->team_id }}</h5>
            </div>
        </div>
        @endforeach
 
@endsection --}}

@section('content')
<div class="container"> 
    <div class="container">
        <h1>Teams</h1>
    </div> 
    @foreach ($teams as $team)
            <div class="col-md-8">
                <div class="card"> 
                    <div class="card-body">                     
                        <div><a href="/teams/{{$team->id}}/edit" class="btn btn-primary float-md-right">Edit</a></div>      
                        <h5>Team Name: {{ $team->team_name }}</h5>
                        <h5>Team ID: {{ $team->team_id }}</h5>
                        {!!Form::open(['action' => ['TeamsController@destroy', $team->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger float-md-right'])}}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
    @endforeach
</div>    
@endsection