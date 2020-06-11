@extends('layouts.app')

@section('content')

<div class="container">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
<a href="{{ route('home') }}">&laquo; Tillbaka</a>
    <h3>Lag</h3>
    <ul class="list-group mb-2">
        @foreach ($teams as $team)
            <li class="list-group-item">
            <a href="{{ route('teams.show', $team->id) }}">{{ $team->teamName }}</a>
            {{ $team->activity->activity }}
            <div class="badge badge-primary">{{ count($team->users) }}</div>
            </li>
        @endforeach
    </ul>

    {{ $teams->links() }}

</div>

@endsection
