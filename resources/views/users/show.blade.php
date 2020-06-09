@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('users.index') }}">&laquo; Tillbaka</a>
    <h3>{{ $user->fullname() }} ({{ $user->dob }})</h3>
    <ul>
        @foreach ($user->membershipFees as $fee)
        <li>
            {{ $fee->year }} | {{ $fee->price }}kr | {{ $fee->paid ? 'Betalad' : 'Ej betalad' }}
            @if (!$fee->paid)
                <form action="{{ route('membershipFee.update', $fee->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('patch')

                    <button type="submit" class="btn btn-sm btn-outline-primary">Betalt</button>
                </form>
            @endif
        </li>
        @endforeach
    </ul>
</div>
@endsection