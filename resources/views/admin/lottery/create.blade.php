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
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" required>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="number">Número</label>
                    <input type="number" class="form-control" name="number" id="number" placeholder="Número" required>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="img">Imagen</label>
                    <input type="file" class="form-control" name="img" id="img" placeholder="Imagen" required>
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