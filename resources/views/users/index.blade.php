@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <h3>Medlemmar</h3>
    <ul class="list-group mb-2">
        @foreach ($users as $user)
            <li class="list-group-item">
                <a href="{{ route('users.show', $user->id) }}">{{ $user->fullname() }}</a> ({{ $user->dob }})
                @if ($user->unpaidFeesCount() > 0)
                <p class="m-0">Ej betalda avgifter: {{ $user->unpaidFeesCount() }}</p>
                @endif
            </li>
        @endforeach
    </ul>

    {{ $users->links() }}
</div>
@endsection