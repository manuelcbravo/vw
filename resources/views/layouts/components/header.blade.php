@php $locale = session()->get('locale'); @endphp
<header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-bordered bg-white">
    <div class="navbar-nav-wrap">
        <!-- Logo -->
        <a class="navbar-brand" href="index.html" aria-label="Front">
            <img class="navbar-brand-logo" src="assets/svg/logos/logo.svg" alt="Logo" data-hs-theme-appearance="default">
            <img class="navbar-brand-logo" src="assets/svg/logos-light/logo.svg" alt="Logo" data-hs-theme-appearance="dark">
            <img class="navbar-brand-logo-mini" src="assets/svg/logos/logo-short.svg" alt="Logo" data-hs-theme-appearance="default">
            <img class="navbar-brand-logo-mini" src="assets/svg/logos-light/logo-short.svg" alt="Logo" data-hs-theme-appearance="dark">
        </a>
        <!-- End Logo -->

        <div class="navbar-nav-wrap-content-start">
            <!-- Navbar Vertical Toggle -->
            <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
            </button>

            <!-- End Navbar Vertical Toggle -->
        </div>

        <div class="navbar-nav-wrap-content-end">
            <!-- Navbar -->
            <ul class="navbar-nav">

                <li class="nav-item d-none d-sm-inline-block">
                    <div class="dropdown">
                        <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown3" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                            @switch($locale)
                                @case('en')
                                <img class="avatar avatar-xss avatar-circle me-2" src="{{asset('assets/vendor/flag-icon-css/flags/1x1/us.svg')}}" width="25px"> En
                                @break
                                @case('mx')
                                <img class="avatar avatar-xss avatar-circle me-2" src="{{asset('assets/vendor/flag-icon-css/flags/1x1/mx.svg')}}" width="25px"> Es
                                @break
                                @default
                                <img class="avatar avatar-xss avatar-circle me-2" src="{{asset('assets/vendor/flag-icon-css/flags/1x1/mx.svg')}}" width="25px"> Es
                            @endswitch
                        </button>

                        <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown3">
                            <a class="dropdown-item" href="lang/en"><img class="avatar avatar-xss avatar-circle me-2" src="{{asset('assets/vendor/flag-icon-css/flags/1x1/us.svg')}}" width="25px"> English</a>
                            <a class="dropdown-item" href="lang/es"><img class="avatar avatar-xss avatar-circle me-2" src="{{asset('assets/vendor/flag-icon-css/flags/1x1/mx.svg')}}" width="25px"> Español</a>
                        </div>

                    </div>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <!-- Notification -->
                    <div class="dropdown">
                        <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                        </button>

                        <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown">
                            <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                                <i class="bi-moon-stars me-2"></i>
                                <span class="text-truncate" title="Auto (system default)">Auto (system default)</span>
                            </a>
                            <a class="dropdown-item" href="#" data-icon="bi-brightness-high" data-value="default">
                                <i class="bi-brightness-high me-2"></i>
                                <span class="text-truncate" title="Default (light mode)">Default (light mode)</span>
                            </a>
                            <a class="dropdown-item active" href="#" data-icon="bi-moon" data-value="dark">
                                <i class="bi-moon me-2"></i>
                                <span class="text-truncate" title="Dark">Dark</span>
                            </a>
                        </div>
                    </div>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <!-- Notification -->
                    <div class="dropdown">
                        <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                            <i class="bi-bell"></i>
                            <span class="btn-status btn-sm-status btn-status-danger" id="status_notificacion"></span>
                        </button>

                        <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 25rem;">
                            <div class="card">
                                <div class="card-header card-header-content-between">
                                    <h4 class="card-title mb-0">Notificaciones</h4>
                                </div>
                                <div class="card-body-height">
                                    <ul class="list-group list-group-flush navbar-card-list-group nav_notifications">
                                        <h5 id="no_notificaciones" class="m-3">No hay notificaciones</h5>
                                    </ul>
                                    <div class="text-center" id="spinnerNList">
                                        <div class="spinner-border text-primary spinner-border-sm" style="width: 3rem; height: 3rem;" role="status" >
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <!-- Account -->
                    <div class="dropdown">
                        <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
                           <span class="avatar avatar-sm avatar-primary avatar-circle">
                                <span class="avatar-initials">{{ Auth::user()->name[0] }}</span>
                           </span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                            <div class="dropdown-item-text">
                                <div class="flex-grow-1">
                                    <h5 class="mb-0">{{ Auth::user()->name .' ' .Auth::user()->apellidos }}</h5>
                                    <p class="card-text text-body">{{ Auth::user()->email }}</p>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('perfil.index') }}">Perfil</a>

                            <div class="dropdown-divider"></div>



                            <form class="logout" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                <a class="dropdown-item" onclick="event.preventDefault(); localStorage.clear();;
                                        this.closest('.logout').submit();">
                                    Cerrar sesión
                                </a>

                            </form>
                        </div>
                    </div>
                    <!-- End Account -->
                </li>
            </ul>
            <!-- End Navbar -->
        </div>
    </div>
</header>