@extends('layouts.app')

@section('content')
    <div class="container">
    <a href="{{ route('teams.index') }}">&laquo; Tillbaka</a>
    <h3>
        {{ $team->teamName }}
        <form action="{{ route('teams.destroy', $team->id) }}" method="post" class="d-inline">
            @csrf
            @method('delete')

            <button type="submit" class="btn btn-sm btn-outline-danger">Ta bort</button>
        </form>
    </h3>
    <ul>
    @foreach ($team->users as $user)
        <li class="list-group-item border-0"> {{ $user->fullname() }}
            <form action="{{ route('teams.detach', [$team->id, $user->id]) }}" method="post" class="d-inline">
            @csrf
            @method('patch')

                <button type="submit" class="btn btn-sm btn-outline-danger">Ta bort</button>
            </form>
        </li>
    @endforeach
    </ul>
</div>
@endsection
