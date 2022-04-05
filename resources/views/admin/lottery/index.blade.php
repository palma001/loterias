@extends('layout.base')

@section('header-title')
    <i class="fa fa-fw fa-user"></i> {{ Auth::user()->name }}
@endsection

@section('content')

    <div class="row" ng-controller="SortController">
        <div class="col-xs-12">
            <h3>
                Lista de fichas
                <a href="{{ route('lotteries.create') }}" class="btn btn-primary-color">
                    <i class="fa fa-fw fa-plus"></i>
                </a>
            </h3>
            <hr>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th width="25%">Nombre</th>
                        <th width="25%">Limite</th>
                        <th width="25%">Pago por 100</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sorts as $ds)
                        <tr>
                            <td>{{ $ds->description }}</td>
                            <td>{{ $ds->daily_limit }}</td>
                            <td>{{ $ds->pay_per_100 }}</td>
                            <td>
                                <a href="{{ route('lotteries.edit', $ds->id) }}" class="btn btn-warning">
                                    <i class="fa fa-fw fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection