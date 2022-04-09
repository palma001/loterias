{{-- <!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style="width: 100%!important;">
        @if(Auth::check())

            <a class="navbar-brand" href="{{ route('user.index') }}">Btcplays <small>({{ (new \DateTime('now'))->format('d-m-Y h:i a') }})</small> </a>

            <!-- Top Menu Items -->

            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <li>
                        <a href="{{ route('user.index') }}"><i class="fa fa-fw fa-home"></i> Vender ticket</a>
                    </li>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">Disabled</a>
                </li>
              </ul>
            <ul class="nav navbar-right top-nav" style="float: right;">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Opciones <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('results.index') }}"><i class="glyphicon glyphicon-ok"></i> Resultados</a>
                        </li>
                        <li>
                            <a href="{{ route('user.list') }}"><i class="fa fa-fw fa-list"></i> Lista de tickets</a>
                        </li>
                        <li>
                            <a href="{{ route('user.report') }}"><i class="glyphicon glyphicon-list-alt"></i> Reporte</a>
                        </li>

                        @if(Auth::user()->level === \App\User::LEVEL_ADMIN)
                            <li class="divider"></li>
                            <li>
                                <a href="{{ route('sorts.index') }}"><i class="glyphicon glyphicon-calendar"></i> Sorteos</a>
                            </li>
                            <li>
                                <a href="{{ route('ticketOffice.index') }}"><i class="glyphicon glyphicon-home"></i> Taquillas</a>
                            </li>
                            <li>
                                <a href="{{ route('lotteries.index') }}"><i class="glyphicon glyphicon-list-alt"></i> Loterias</a>
                            </li>
                            <li>
                                <a href="{{ route('tokens.index') }}"><i class="glyphicon glyphicon-certificate"></i> Fichas</a>
                            </li>
                        @endif
                                    <!--
            <li>
                <a href="#"><i class="fa fa-fw fa-gear"></i> Configuración</a>
            </li>
            -->
                            <li class="divider"></li>
                            <li>
                                <a href="{{ route('index.logout') }}"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                            </li>
                    </ul>
                </li>
            </ul>
        @endif
    </div>
</nav> --}}
<nav class="navbar navbar-default navbar-fixed-top navbar-end">
    <div class="navbar-header" style="width: 100%!important;">
        @if(Auth::check())
            <a class="navbar-brand" href="{{ route('user.index') }}">Sistema de apuesta <small>({{ (new \DateTime('now'))->format('d-m-Y h:i a') }})</small> </a>
            <ul class="nav navbar-nav" style="float: right;">
                <li>
                    <a href="{{ route('user.index') }}"><i class="fa fa-fw fa-home"></i> Vender ticket</a>
                </li>
                <li>
                    <a href="{{ route('results.index') }}"><i class="glyphicon glyphicon-ok"></i> Resultados</a>
                </li>
                <li>
                    <a href="{{ route('user.list') }}"><i class="fa fa-fw fa-list"></i> Lista de tickets</a>
                </li>
                <li>
                    <a href="{{ route('user.report') }}"><i class="glyphicon glyphicon-list-alt"></i> Reporte</a>
                </li>
                @if(Auth::user()->level === \App\User::LEVEL_ADMIN)
                    <li>
                        <a href="{{ route('sorts.index') }}"><i class="glyphicon glyphicon-calendar"></i> Sorteos</a>
                    </li>
                    <li>
                        <a href="{{ route('ticketOffice.index') }}"><i class="glyphicon glyphicon-home"></i> Taquillas</a>
                    </li>
                    <li>
                        <a href="{{ route('lotteries.index') }}"><i class="glyphicon glyphicon-list-alt"></i> Loterias</a>
                    </li>
                    <li>
                        <a href="{{ route('tokens.index') }}"><i class="glyphicon glyphicon-certificate"></i> Fichas</a>
                    </li>
                @endif
                <li>
                    <a href="{{ route('index.logout') }}"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                </li>
            </ul>
        @endif
    </div>
</nav>
