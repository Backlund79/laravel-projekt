@extends('layouts.app')

@section('content')
<div class="container">
    <ul>
        @foreach ($users as $user)
            <li><a href="{{ route('users.show', $user->id) }}">{{ $user->fullname() }}</a> ({{ $user->dob }})</li>
            @if ($user->unpaidFeesCount() > 0)
                Unpaid fees: {{ $user->unpaidFeesCount() }}
            @endif
        @endforeach
    </ul>

    {{ $users->links() }}
</div>
@endsection