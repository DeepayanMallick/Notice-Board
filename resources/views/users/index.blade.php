@extends('layouts.app')

@section('content')
<div class="container"> 
    <div class="container">
        <h1>User List</h1>
    </div> 

    @foreach ($users as $user)
    @if ($user->role != 'admin')
            <div class="col-md-8">
                <div class="card"> 
                    <div class="card-body">
                                             
                        <div><a href="/users/{{$user->id}}/edit" class="btn btn-primary float-md-right">Edit</a></div>      
                        <h5>User Name: {{ $user->name }}</h5>
                        <h5>Email: {{ $user->email }}</h5>
                        <h5>Team Name: {{ $user->team->team_name }}</h5>
                        
                    </div>
                </div>
            </div>
    @endif
    @endforeach

</div>    
@endsection