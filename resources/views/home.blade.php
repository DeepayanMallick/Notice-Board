@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">                 
                @foreach ($notices as $notice)
                    <div class="card">
                        <div class="card-body">
                            <h4>{{ $notice->title }}</h4>
                            <h5>Notice for team {{ $notice->team->team_name }}</h5>
                            <div>
                                {{ $notice->body }}
                            </div>
                            <small>Written on {{$notice->created_at}}</small>
                        </div>
                    </div>
                @endforeach                
            </div>
            @if (Auth::user() && Auth::user()->role != 'admin')
            <div class="card">                 
                @foreach ($notices as $notice)
                    <div class="card">
                        <div class="card-body">
                            <h4>{{ $notice->title }}</h4>
                            <h5>Notice for all teams</h5>
                            <div>
                                {{ $notice->body }}
                            </div>
                            <small>Written on {{$notice->created_at}}</small>
                        </div>
                    </div>
                @endforeach                
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
