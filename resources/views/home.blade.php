@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if (auth()->user()->isAdmin())
                    <div class="row">
                        <div class="col-6">
                            <h2>Administration</h2>
                            <ul class="list-group">
                                <li class="list-group-item border-0"><a href="{{ route('users.index') }}">Medlemmar</a></li>
                                <li class="list-group-item border-0"><a href="{{ route('users.unpaid') }}">Medlemmar med obetalade avgifter</a></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <h2>Medlemsavgifter</h2>

                            <ul class="list-group">
                                <li class="list-group-item border-0">
                                    <h4>Betalade</h4>
                                    <p class="m-0">Antal: {{ $membershipFees['paid']['count'] }}</p>
                                    <p class="m-0">Summa: {{ $membershipFees['paid']['sum'] }}kr</p>
                                </li>
                                <li class="list-group-item border-0">
                                    <h4>Ej Betalade</h4>
                                    <p class="m-0">Antal: {{ $membershipFees['unpaid']['count'] }}</p>
                                    <p class="m-0">Summa: {{ $membershipFees['unpaid']['sum'] }}kr</p>
                                </li>
                            </ul>
                        </div>
                    </div>
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
