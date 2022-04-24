

@extends('layout.base')

@section('header-title')
    <i class="fa fa-fw fa-user"></i> {{ Auth::user()->name }}
@endsection

@section('content')

    <div class="row">

        <div class="col-xs-12">
            <h3>
                Lista de números mas jugados
            </h3>
            <hr>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th width="20%">Ficha</th>
                        <th width="20%">Sorteo</th>
                        <th width="20%">Cantidad Jugada</th>
                        <th width="20%">Total</th>
                        <th width="20%">Total a pagar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bestSellers as $bestSeller)
                        <tr>
                            <td>{{ $bestSeller->name }}</td>
                            <td>{{ \DateTime::createFromFormat('H:i:s', $bestSeller->time_sort)->format('h:i a') }}</td>
                            <td>{{ $bestSeller->amountPlayed }}</td>
                            <td>{{ number_format($bestSeller->totalPlayed, 2, ',', '.') }}</td>
                            <td>{{ number_format(($bestSeller->pay_per_100 / $bestSeller->amountTicket) * ($bestSeller->totalPlayed / 100), 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection