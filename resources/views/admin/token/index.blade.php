@extends('layout.base')

@section('header-title')
    <i class="fa fa-fw fa-user"></i> {{ Auth::user()->name }}
@endsection

@section('content')

    <div class="row" ng-controller="SortController">

        <div class="col-xs-12">

            <h3>
                Lista de fichas
                <a href="{{ route('tokens.create') }}" class="btn btn-primary-color">
                    <i class="fa fa-fw fa-plus"></i>
                </a>
            </h3>
            <hr>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th width="25%">Sorteo</th>
                        <th width="25%">Nombre</th>
                        <th width="25%">Numbero</th>
                        <th width="25%">Imagen</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tokens as $ds)
                        <tr>
                            <td>{{ $ds->sort->description }}</td>
                            <td>{{ $ds->name }}</td>
                            <td>{{ $ds->number }}</td>
                            <td>
                                <img
                                    src="{{ $ds->path }}"
                                    alt="{{ $ds->name }}"
                                    style="max-width: 40px"
                                >
                            </td>
                            <td>
                                <a href="{{ route('tokens.edit', $ds->id) }}" class="btn btn-warning">
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