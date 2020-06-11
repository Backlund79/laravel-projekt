@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('users.index') }}">&laquo; Tillbaka</a>
    <h3>
        {{ $user->fullname() }} ({{ $user->dob }})
        <form action="{{ route('users.destroy', $user->id) }}" method="post" class="d-inline">
            @csrf
            @method('delete')

            <button type="submit" class="btn btn-sm btn-outline-danger">Ta bort</button>
        </form>
    </h3>
    <ul>
        @foreach ($user->membershipFees as $fee)
        <li>
            {{ $fee->year }} | {{ $fee->price }}kr | {{ $fee->paid ? 'Betalad' : 'Ej betalad' }}
            @if (!$fee->paid)
                <form action="{{ route('membershipFee.update', $fee->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('patch')

                    <button type="submit" class="btn btn-sm btn-link">Betalt</button>
                </form>
            @endif
        </li>
        @endforeach
    </ul>

    <h3>Lag</h3>

    <ul>
    @foreach ($user->teams as $team)
        <li class="list-group-item border-0"> {{ $team->teamName }} ({{ $team->activity->activity }})
        <form action="{{ route('users.detach', [$user->id, $team->id]) }}" method="post" class="d-inline">
            @csrf

                <button type="submit" class="btn btn-sm btn-link">Ta bort</button>
            </form>
        </li>
    @endforeach
    </ul>

    <h4>Lägg till i lag</h4>
    <form action="{{ route('users.attach', $user->id) }}" method="post">
        @csrf
        <team-picker :activities="{{ $activites }}"></team-picker>

        <button type="submit" class="btn btn-primary">Lägg till</button>
    </form>

</div>
@endsection
