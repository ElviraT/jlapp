<div class="navbar-custom">
    <div class="topbar p-0">
        <div class="topbar-menu d-flex align-items-center gap-1">

            <!-- Sidebar Menu Toggle Button -->
            <button class="button-toggle-menu">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>

        <ul class="topbar-menu d-flex align-items-center">
            <!-- Fullscreen Button -->
            <li class="d-none d-md-inline-block">
                <a class="nav-link waves-effect waves-light" href="#" data-toggle="fullscreen">
                    <i class="fe-maximize font-22"></i>
                </a>
            </li>

            <!-- Notofication dropdown -->
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light arrow-none" data-bs-toggle="dropdown"
                    href="#dropdownMenuLink" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-bell font-22"></i>
                    @if (count(auth()->user()->unreadNotifications))
                        <span
                            class="badge bg-light rounded-circle noti-icon-badge">{{ count(auth()->user()->unreadNotifications) }}</span>
                    @endif
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <span class="dropdown-header">{{ 'Notificaciones no leidas' }}</span>
                    @forelse (auth()->user()->unreadNotifications as $notification)
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-evelope mr-2"></i>{{ $notification->data['idProduct'] }}
                            <span
                                class="ml-3 pull-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                        </a>
                    @empty
                        <span class="ml-3 pull-right text-muted text-sm"> {{ 'Sin notificaciones por leer' }}</span>
                    @endforelse
                    <div class="dropdown-divider"></div>
                    <span class="dropdown-header">{{ 'Notificaciones leidas' }}</span>

                    @forelse (auth()->user()->readNotifications as $notification)
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-evelope mr-2"></i>{{ $notification->data['idProduct'] }}
                            <span
                                class="ml-3 pull-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
                        </a>
                    @empty
                        <span class="ml-3 pull-right text-muted text-sm"> {{ 'Sin notificaciones leidas' }}</span>
                    @endforelse
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('markAsRead') }}"
                        class="dropdown-item dropdown-footer">{{ 'Marcar todos como leidos' }}
                    </a>
                </div>
            </li>

            <!-- Light/Darj Mode Toggle Button -->
            <li class="d-none d-sm-inline-block">
                <div class="nav-link waves-effect waves-light" id="light-dark-mode">
                    <i class="ri-moon-line font-22"></i>
                </div>
            </li>

            <!-- Right Bar offcanvas button (Theme Customization Panel) -->
            <li>
                <a class="nav-link waves-effect waves-light" data-bs-toggle="offcanvas"
                    href="#theme-settings-offcanvas">
                    <i class="fe-settings font-22"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
