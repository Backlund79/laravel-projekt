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
                                <li class="list-group-item border-0"><a href="{{ route('teams.index') }}
                                ">Lag</a></li>
                                 <li class="list-group-item border-0"><a href="{{ route('teams.create') }}
                                ">Lägg till Lag</a></li>
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
                    <!-- Medlemmar inloggade -->
                        <h3>Dina uppgifter</h3>
                        
                        <form action="{{ route('users.update', auth()->user()->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('patch')
                            
                            <input type="text">

                            <button type="submit" class="btn btn-sm btn-link">Uppdatera</button>
                        </form>

                        <table>
                            <tr>
                                <th>Namn:</th>
                                <td>{{ auth()->user()->fullname() }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ auth()->user()->email }}</td>
                               
                                    
                            </tr>
                            <tr>
                                <th>Födelsedatum:</th>
                                <td>{{ auth()->user()->dob }}</td>
                            </tr>
                        </table>
                        <h3 class="mt-3">Dina lag</h3>                       
                        @foreach (auth()->user()->teams as $team)
                        
                        <table>
                            <h4>{{ $team->activity->activity }}</h4>
                            <h5>{{ $team-> teamName}}</h5>
                            @foreach ($team->users as $user)
                                <tr>
                                    <td>
                                        {{ $user->fullname()}}
                                    </td>
                                </tr>
                            @endforeach
                        <table>
                        @endforeach
                    
                        
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
