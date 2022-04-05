@extends('layout.base')

@section('header-title')
    <i class="fa fa-fw fa-user"></i> {{ Auth::user()->name }}
@endsection

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <h3>Editar Ficha</h3>
            <hr>
        </div>
    </div>

    <form action="{{ route('tokens.update', $token->id) }}" method="post" enctype="multipart/form-data">

        <div class="row">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="sort_id">Sorteo</label>
                    <select name="sort_id" id="sort_id" class="form-control">
                        @foreach($sorts as $sort)
                            @if($sort->id === $token->sort_id)
                                <option value="{{ $sort->id }}" selected>{{ $sort->description }}</option>
                            @else
                                <option value="{{ $sort->id }}">{{ $sort->description }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="{{ $token->name }}" required>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="number">Número</label>
                    <input type="number" class="form-control" name="number" id="number" placeholder="Número" value="{{ $token->number }}" required>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="img">Imagen</label>
                    <input type="file" class="form-control" name="img" id="img" placeholder="Imagen">
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