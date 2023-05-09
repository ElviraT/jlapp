<div class="app-menu">

    <!-- Brand Logo -->
    <div class="logo-box">
        <!-- Brand Logo Light -->
        <a href="dashboard">
            <img src="{{ asset('assets/images/users/user-4.jpg') }}" alt="usuario" class="rounded-circle border-white"
                width="20%">
            {{ auth()->user()->name . ' ' . auth()->user()->last_name }}
        </a>
    </div>

    <!-- menu-left -->
    <div class="scrollbar">

        <!--- Menu -->
        <ul class="menu">
            <li class="menu-item">
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="fas fa-calculator"></i></span>
                    <span class="menu-text"> Calcular Cambio </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('cliente.index') }}" class="menu-link">
                    <span class="menu-icon"><i class="fas fa-user-plus"></i></span>
                    <span class="menu-text"> Clientes</span>
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
