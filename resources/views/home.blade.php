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

                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
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
                                <li class="list-group-item border-0"><a href="{{ route('membershipFee.index') }}">Alla medlemsavgifter</a></li>

                                <li class="list-group-item border-0">
                                    <h4>Betalade</h4>
                                    @php
                                    $fmt = numfmt_create( 'sv_SE', NumberFormatter::CURRENCY )
                                    @endphp
                                    <p class="m-0">Antal: {{ $paidFees->total }}</p>
                                    <p class="m-0">Summa: {{ numfmt_format_currency($fmt, $paidFees->sum, 'SEK') }}</p>
                                </li>
                                <li class="list-group-item border-0">
                                    <h4>Ej Betalade</h4>
                                    <p class="m-0">Antal: {{ $unpaidFees->total }}</p>
                                    <p class="m-0">Summa: {{ numfmt_format_currency($fmt, $unpaidFees->sum, 'SEK') }}</p>
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
