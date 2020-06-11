@extends('layouts.app');

@section('content')
    
<div class="container">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <h3>Lag</h3>
    <ul class="list-group mb-2">
        @foreach ($teams as $team)
            <li class="list-group-item">
                {{ $team->teamName }}
            </li>
        @endforeach
    </ul>

</div>

@endsection
