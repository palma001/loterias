@extends('layout.base')
{{--@section('header-title')
    <i class="fa fa-fw fa-user"></i> {{ Auth::user()->name }}
@endsection
--}}
@section('css')
    <link rel="stylesheet" href="{{ asset('css/lotery.css') }}">
@endsection

@section('content')
    @if(count($sort->dailySorts))
        <div class="row section-animals mt-5" ng-controller="AnimalController">
            <div class="col-12">
                <div class="title-lotery">
                    <div class="row">
                        <div class="col-2">
                            <img src="https://getbootstrap.com/docs/4.1/assets/img/favicons/favicon.ico" width="30" height="30" class="d-inline-block align-top" alt="">
                        </div>
                        <div class="col-6">
                            <h4>
                                {{ $sort->description }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row section-animals mt-4">
                <div class="col-xs-12 col-sm-12 col-lg-4 col-md-5">
                    <div class="">
                        <!-- Agregar por numero -->
                        <form action="{{ route('user.create') }}" method="post" name="formAnimal" id="formAnimal">
                            @if(count($sort->dailySorts))
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="row" ng-if="data.animalsTicket.length">
                                            <div class="col-12 cant-animalito">
                                                <p>
                                                    <strong>Total:</strong>
                                                    [[ total ]] Bsf
                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <input type="text" class="form-control" value="Cant. [[ data.animalsTicket.length ]]" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach($sort->dailySorts as $dailySort)
                                        <div class="col-sm-12">
                                            <input
                                            type="checkbox"
                                            name="sorts[{{ $dailySort->id }}]"
                                            ng-model="data.sorts[{{ $dailySort->id }}]"
                                            data-sort-id="{{ $dailySort->id }}"
                                            @if($dailySort->id === $sort->dailySorts[0]->id)
                                            ng-init="data.sorts[{{ $dailySort->id }}]=true"
                                            id="nextSortCheck"
                                            @else
                                            ng-init="data.sort[{{ $dailySort->id }}]=false"
                                            @endif
                                            ng-change="getTotal()"
                                            onkeydown="return (event.keyCode !== 13)"
                                            onkeypress="return (event.keyCode !== 13)"
                                            onkeyup="return (event.keyCode !== 13)">
                                            {{ $dailySort->timeSortFormat() }}
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            {{ csrf_field() }}

                            <!-- Animalitos jugados -->
                            <div id="spaceAnimalTicket" style="overflow: auto; width: 100%; margin-bottom: 10px;">
                                <table class="table">
                                    <tbody>
                                        <tr ng-repeat="animal in data.animalsTicket" ng-class="{'bg-danger' : animal.limitError}">
                                            <td>
                                                <img class="img-responsive"
                                                ng-src="[[ data.imgUrl + '/' + animal.name + '.png' ]]"
                                                alt="[[ animal.name ]]"
                                                style="width: 100%; border-radius: 6px;">
                                            </td>
                                            <td width="20%">
                                                <span class="text-danger" ng-if="animal.limitError || true">
                                                    <strong>Limite:</strong>
                                                    [[ animal.limit ]]
                                                </span>
                                            </td>
                                            <td width="40%">
                                                <input
                                                type="hidden"
                                                class="form-control"
                                                placeholder="Valor"
                                                ng-value="animal.id"
                                                name="animals[]"
                                                required
                                                >
                                                <input
                                                type="number"
                                                class="form-control"
                                                placeholder="Valor"
                                                ng-model="animal.amount"
                                                name="amounts[]"
                                                ng-change="getTotal()"
                                                required
                                                onkeydown="return (event.keyCode !== 13)"
                                                onkeypress="return (event.keyCode !== 13)"
                                                onkeyup="return (event.keyCode !== 13)"
                                                >
                                                <span
                                                    class="error"
                                                    ng-show=""
                                                    >
                                                    Este valor es requerido
                                                </span>
                                            </td>
                                            <td>
                                                <button type="button"
                                                class="btn btn-danger"
                                                ng-click="removeFromTicket($index)">
                                                <i class="fa fa-remove"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>  
                            <div class="text-center">
                                <button
                                type="button"
                                id="btnSaveTicket"
                                class="btn btn-lg btn-primary-color"
                                ng-if="data.animalsTicket.length && ! submitted"
                                ng-disabled="! hasSelectedSort() || hasLimitError() || submitted"
                                ng-click="saveTicket()">
                                <i class="fa fa-save"></i> Guardar ticket (F2)
                                </button>

                                <img
                                ng-if="submitted"
                                src="{{ asset('img/loading.gif') }}"
                                alt="Cargando.."
                                >
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-8 col-md-7 col-xm-12">
                    <div class="row animal-list justify-content-center">
                        <!-- Lista de animalitos -->
                        <div class="col-xs-2 col-sm-3 col-md-3 col-lg-2 section-animals__item" ng-repeat="animal in data.animalsList">
                            <p class="text-center" ng-hide="hasTicket(animal.id);">
                                <a href="" ng-click="addToTicket(animal);">
                                    <img ng-src="[[ data.imgUrl + '/' + animal.name + '.png' ]]" alt="[[ animal.name ]]">
                                </a>
                            </p>
                            <p class="text-center" ng-show="hasTicket(animal.id);">
                                <img ng-src="[[ data.imgUrl + '/' + animal.name + '.png' ]]" alt="[[ animal.name ]]" class="selected">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="time-sort" tabindex="1" data-toggle="tooltip" title="Disabled tooltip">
                <p>
                    <strong>Cierre aproximado:</strong>
                    <span ng-class="{
                            'bg-danger' : (hours === 0 && minutes === 0 && seconds === 0),
                            'text-danger' : (hours === 0 && minutes === 0 && seconds === 0)
                        }">
                        [[ hours >= 10 ? hours : '0' + hours ]]:[[ minutes >= 10 ? minutes : '0' + minutes ]]:[[ seconds >= 10 ? seconds : '0' + seconds ]]
                    </span>
                </p>
            </div>
        </div>
    @else 
        <div class="alert alert-danger">
            <strong>Atención: </strong> En estos momentos no hay sorteos abiertos
        </div>
    @endif
@endsection

@section('js')
    <script>
        var imgUrl = 'img/';
        var seconds = {{ $seconds }}

        imgUrl = '{{ asset('img/' . $sort->folder) }}';

        var data = {
            animalsList : {!! json_encode($animals) !!},
            imgUrl : imgUrl,
        };

        $('#newAnimalNumber').focus();

        $(window).on('keydown', function(event) {
            if (event.keyCode === 113) {
                    // F2
                    $('#btnSaveTicket').click();
                }
            });
    </script>
@endsection