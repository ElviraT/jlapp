<div class="offcanvas offcanvas-end right-bar" tabindex="-1" id="theme-settings-offcanvas">
    <div class="d-flex align-items-center w-100 p-0 offcanvas-header">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-bordered nav-justified w-100" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#menu" role="tab">
                    <i class="mdi mdi-cog-outline d-block font-22 my-1"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#settings-tab" role="tab">
                    <i class="mdi mdi-cog-outline d-block font-22 my-1"></i>
                </a>
            </li>
        </ul>
    </div>

    <div class="offcanvas-body p-3 h-100" data-simplebar>
        <!-- Tab panes -->
        <div class="tab-content pt-0">
            <div class="tab-pane active" id="menu" role="tabpanel">
                <div class="app-menu">
                    <!--- Menu -->
                    <ul class="menu">
                        <li class="menu-item">
                            <a href="{{ route('farmacia.index') }}" class="menu-link">
                                <span class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H96V32H64zm64 0V480H448V32H128zM512 480c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H480V480h32zM256 176c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v48h48c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H320v48c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V288H208c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16h48V176z" />
                                    </svg></span>
                                <span class="menu-text"> Farmacias</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-pane" id="settings-tab" role="tabpanel">

                <div class="mt-n3">
                    <h6 class="fw-medium py-2 px-3 font-13 text-uppercase bg-light mx-n3 mt-n3 mb-3">
                        <span class="d-block py-1">{{ 'Configuración del Tema' }}</span>
                    </h6>
                </div>

                <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h5>

                <div class="colorscheme-cardradio">
                    <div class="d-flex flex-column gap-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-light"
                                value="light">
                            <label class="form-check-label" for="layout-color-light">Light</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-dark"
                                value="dark">
                            <label class="form-check-label" for="layout-color-dark">Dark</label>
                        </div>
                    </div>
                </div>

                <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Content Width</h5>
                <div class="d-flex flex-column gap-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="data-layout-width"
                            id="layout-width-default" value="default">
                        <label class="form-check-label" for="layout-width-default">Fluid (Default)</label>
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="data-layout-width" id="layout-width-boxed"
                            value="boxed">
                        <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                    </div>
                </div>

                <div id="layout-mode">
                    <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Layout Mode</h5>

                    <div class="d-flex flex-column gap-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-layout-mode"
                                id="layout-mode-default" value="default">
                            <label class="form-check-label" for="layout-mode-default">Default</label>
                        </div>


                        <div id="layout-detached">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="data-layout-mode"
                                    id="layout-mode-detached" value="detached">
                                <label class="form-check-label" for="layout-mode-detached">Detached</label>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Topbar Color</h5>

                <div class="d-flex flex-column gap-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="data-topbar-color"
                            id="topbar-color-light" value="light">
                        <label class="form-check-label" for="topbar-color-light">Light</label>
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="data-topbar-color"
                            id="topbar-color-dark" value="dark">
                        <label class="form-check-label" for="topbar-color-dark">Dark</label>
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="data-topbar-color"
                            id="topbar-color-brand" value="brand">
                        <label class="form-check-label" for="topbar-color-brand">Brand</label>
                    </div>
                </div>

                <div>
                    <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Menu Color</h5>

                    <div class="d-flex flex-column gap-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-menu-color"
                                id="leftbar-color-light" value="light">
                            <label class="form-check-label" for="leftbar-color-light">Light</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-menu-color"
                                id="leftbar-color-dark" value="dark">
                            <label class="form-check-label" for="leftbar-color-dark">Dark</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-menu-color"
                                id="leftbar-color-brand" value="brand">
                            <label class="form-check-label" for="leftbar-color-brand">Brand</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-menu-color"
                                id="leftbar-color-gradient" value="gradient">
                            <label class="form-check-label" for="leftbar-color-gradient">Gradient</label>
                        </div>
                    </div>
                </div>

                <div id="menu-icon-color">
                    <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Menu Icon Color</h5>

                    <div class="d-flex flex-column gap-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-two-column-color"
                                id="twocolumn-menu-color-light" value="light">
                            <label class="form-check-label" for="twocolumn-menu-color-light">Light</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-two-column-color"
                                id="twocolumn-menu-color-dark" value="dark">
                            <label class="form-check-label" for="twocolumn-menu-color-dark">Dark</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-two-column-color"
                                id="twocolumn-menu-color-brand" value="brand">
                            <label class="form-check-label" for="twocolumn-menu-color-brand">Brand</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-two-column-color"
                                id="twocolumn-menu-color-gradient" value="gradient">
                            <label class="form-check-label" for="twocolumn-menu-color-gradient">Gradient</label>
                        </div>
                    </div>
                </div>

                <div>
                    <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Menu Icon Tone</h5>

                    <div class="d-flex flex-column gap-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-menu-icon"
                                id="menu-icon-default" value="default">
                            <label class="form-check-label" for="menu-icon-default">Default</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-menu-icon"
                                id="menu-icon-twotone" value="twotones">
                            <label class="form-check-label" for="menu-icon-twotone">Twotone</label>
                        </div>
                    </div>
                </div>

                <div id="sidebar-size">
                    <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Sidebar Size</h5>

                    <div class="d-flex flex-column gap-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                id="leftbar-size-default" value="default">
                            <label class="form-check-label" for="leftbar-size-default">Default</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                id="leftbar-size-compact" value="compact">
                            <label class="form-check-label" for="leftbar-size-compact">Compact (Medium
                                Width)</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                id="leftbar-size-small" value="condensed">
                            <label class="form-check-label" for="leftbar-size-small">Condensed (Icon
                                View)</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                id="leftbar-size-full" value="full">
                            <label class="form-check-label" for="leftbar-size-full">Full Layout</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                id="leftbar-size-fullscreen" value="fullscreen">
                            <label class="form-check-label" for="leftbar-size-fullscreen">Fullscreen
                                Layout</label>
                        </div>
                    </div>
                </div>

                <div id="sidebar-user">
                    <h5 class="fw-medium font-14 mt-4 mb-2 pb-1">Sidebar User Info</h5>

                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" name="data-sidebar-user"
                            id="sidebaruser-check">
                        <label class="form-check-label" for="sidebaruser-check">Enable</label>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="offcanvas-footer border-top py-2 px-2 text-center">
        <div class="d-flex gap-2">
            <button type="button" class="btn btn-light w-50" id="reset-layout">Restaurar</button>
        </div>
    </div>
</div>
