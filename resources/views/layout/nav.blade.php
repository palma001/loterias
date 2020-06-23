<nav class="navbar navbar-expand navbar-light bg-light">
    @if(Auth::check())
    <a class="navbar-brand" href="{{ route('user.index') }}">
        <img src="https://getbootstrap.com/docs/4.1/assets/img/favicons/favicon.ico" width="30" height="30" class="d-inline-block align-top" alt="">
        <span class="title-page">
            Loteria de animalito
            <small>({{ (new \DateTime('now'))->format('d-m-Y h:i a') }})</small>
        </span>
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav mr-lg-auto mr-md-auto mr-sm-auto">
        </div>
        <a class="nav-link" href="#">
            <span class="badge badge-danger" style="padding: 7px;">
                Saldo 1000
            </span>
        </a>
        <div class="nav-item dropdown mr-lg-5 mr-md-5 mr-sm-5">
            <a class="nav-link dropdown-toggle badge mr-lg-5 mr-sm-5" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('img/male_avatar.png') }}" class="" style="width: 50px; height: 50px; border-radius: 100%;">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a href="{{ route('results.index') }}" class="dropdown-item">
                    <i class="fa fa-fw fa-check"></i> Resultados
                </a>
                <a href="{{ route('user.list') }}" class="dropdown-item">
                    <i class="fa fa-fw fa-list"></i> Lista de tickets
                </a>
                <a href="{{ route('user.report') }}" class="dropdown-item">
                    <i class="fa fa-fw fa-list-alt"></i> Reporte
                </a>
                @if(Auth::user()->level === \App\User::LEVEL_ADMIN)
                    <a href="{{ route('sorts.index') }}" class="dropdown-item">
                        <i class="fa fa-fw fa-calendar"></i> Sorteos
                    </a>
                    <a href="{{ route('ticketOffice.index') }}" class="dropdown-item">
                        <i class="fa fa-fw fa-home"></i> Taquillas
                    </a>
                @endif
                 <div class="dropdown-divider"></div>
                <a href="{{ route('index.logout') }}" class="dropdown-item">
                    <i class="fa fa-fw fa-power-off"></i> Salir
                </a>
            </div>
        </div>
    </div>
    @endif
</nav>