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
                <li class="list-group-item border-0"> {{ $team->teamName }}
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