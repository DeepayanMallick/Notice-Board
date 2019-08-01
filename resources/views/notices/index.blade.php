@extends('layouts.app')

@section('content')
    <h1>Notices</h1>
    @if (count($notices) > 0)
        @foreach ($notices as $notice)
            <div class="card">
                <div class="card-body">
                    <h3><a href="/notices/{{$notice->id}}">{{ $notice->title }}</a></h3>
                    <small>Written on {{$notice->created_at}}</small>
                </div>
            </div>
        @endforeach
        {{$notices->links()}}
    @else
        <p>No notice found</p>
    @endif  
@endsection