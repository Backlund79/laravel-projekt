@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-8">
            <div class="card">
                <div class="card-header">Medlemsavgifter</div>

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

                    @php
                    $fmt = numfmt_create( 'sv_SE', NumberFormatter::CURRENCY )
                    @endphp

                    <h3>Betalade avgifter</h3>
                    <ul class="list-group">
                    @foreach ($paidFees as $fee)
                    <li class="list-group-item border-0">

                        <h4>{{ $fee->year }}</h4>
                        <p class="m-0">Antal: {{ $fee->total }}</p>
                        <p class="m-0">Summa: {{ numfmt_format_currency($fmt, $fee->sum, 'SEK') }}</p>
                    </li>
                    @endforeach
                    </ul>

                    <h3>Ej betalade avgifter</h3>
                    <ul class="list-group">
                    @foreach ($unpaidFees as $fee)
                    <li class="list-group-item border-0">

                        <h4>{{ $fee->year }}</h4>
                        <p class="m-0">Antal: {{ $fee->total }}</p>
                        <p class="m-0">Summa: {{ numfmt_format_currency($fmt, $fee->sum, 'SEK') }}</p>
                    </li>
                    @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
