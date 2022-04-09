@extends('layout.base')

@section('header-title')
    <i class="fa fa-fw fa-user"></i> {{ Auth::user()->name }}
@endsection

@section('content')

    <div class="row">

        <div class="col-xs-12">

            <h3>Registrar sorteo</h3>
            <hr>
        </div>
    </div>

    <form action="{{ route('lotteries.store') }}" method="post" enctype="multipart/form-data">

        <div class="row">
            {{ csrf_field() }}
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="name">Descripción</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Descripción" required>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="number">Pago por 100</label>
                    <input type="number" class="form-control" name="pay_per_100" id="pay_per_100" placeholder="Pago por 100" required>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="number">Carpeta de imagenes</label>
                    <input type="text" class="form-control" name="folder" id="folder" placeholder="Carpeta de imagenes" required>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="img">Limite diario</label>
                    <input type="number" class="form-control" name="daily_limit" id="daily_limit" placeholder="Limite diario" required>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="img">Limite semanal</label>
                    <input type="number" class="form-control" name="week_limit" id="week_limit" placeholder="Limite semanal" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <button class="btn btn-primary-color">
                    <i class="fa fa-fw fa-save"></i> Guardar
                </button>
            </div>
        </div>

    </form>

@endsection