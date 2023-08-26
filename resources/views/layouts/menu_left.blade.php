<div class="app-menu">

    <!-- Brand Logo -->
    <div class="logo-box">
        <!-- Brand Logo Light -->
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/images/users/user-4.jpg') }}" alt="usuario" class="rounded-circle border-white"
                width="20%">
            {{ auth()->user()->name . ' ' . auth()->user()->last_name }}
        </a>
    </div>

    <!-- menu-left -->
    <div class="scrollbar">
        @if (auth()->user()->roles[0]->id == '4')
            <div class="col-md-12 mt-2" align="center">
                <input type="hidden" value="{{ auth()->user()->role }}" id="rol">
                <input type="checkbox" id="predeterminado" name="rol-predeterminado" data-toggle="toggle"
                    data-on="Visitador" data-off="Promotor" data-width="90" data-height="30" data-size="xs">
            </div>
        @endif
        <!--- Menu -->
        <ul class="menu">
            @canany(['Admin', 'Promotor'])
                <li class="menu-item">
                    <a href="{{ route('farmacia.index') }}" class="menu-link">
                        <span class="menu-icon"><i class="fa fa-medkit"></i></span>
                        <span class="menu-text"> Farmacias</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('list_farmacia.index') }}" class="menu-link">
                        <span class="menu-icon"><i class="fa fa-medkit"></i></span>
                        <span class="menu-text"> Farmacias por Zona</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('farmacia.activity') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-calendar-check"></i>
                        </span>
                        <span class="menu-text"> Registro de Actividad</span>
                    </a>
                </li>
            @endcanany
            @canany(['Admin', 'Visitador'])
                <li class="menu-item">
                    <a href="{{ route('medico.index') }}" class="menu-link">
                        <span class="menu-icon"><i class="fas fa-user-md"></i></span>
                        <span class="menu-text"> Medico</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('list_medical.index') }}" class="menu-link">
                        <span class="menu-icon"><i class="fa fa-medkit"></i></span>
                        <span class="menu-text"> Medicos por Zona</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('medico.activity') }}" class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-calendar-check"></i>
                        </span>
                        <span class="menu-text"> Registro de Actividad</span>
                    </a>
                </li>
            @endcanany
            </li>
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="fas fa-calculator"></i></span>
                    <span class="menu-text"> Calcular Cambio </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('logout') }}" class="menu-link"
                    onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                    <span class="menu-icon"><i class="fas fa-sign-out-alt"></i></span>
                    <span class="menu-text"> Cerrar Sesión </span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
        <!--- End Menu -->
        <div class="clearfix"></div>
    </div>
</div>
