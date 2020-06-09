@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if (auth()->user()->isAdmin())
                        <h2>Administration</h2>
                        <ul>
                            <li><a href="{{ route('users.index') }}">Medlemmar</a></li>
                        </ul>
                    @else
                        @if (auth()->user()->unpaidFeesCount() > 0)
                        <div class="alert alert-danger" role="alert">
                            <strong>Du har {{ auth()->user()->unpaidFeesCount() }} obetalda medlemsavgifter!</strong> Vänligen kontakta administrationen.
                        </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
