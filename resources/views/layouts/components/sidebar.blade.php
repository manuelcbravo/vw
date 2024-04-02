<aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white  ">
    <div class="navbar-vertical-container">
        <div class="navbar-vertical-footer-offset">
            <!-- Logo -->

            <a class="navbar-brand" href="index.html" aria-label="Front">
                <img class="navbar-brand-logo" src="{{ ENV('APP_LOGO') }}" alt="Logo" data-hs-theme-appearance="default">
                <img class="navbar-brand-logo" src="assets/svg/logos-light/logo.svg" alt="Logo" data-hs-theme-appearance="dark">
                <img class="navbar-brand-logo-mini" src="assets/svg/logos/logo-short.svg" alt="Logo" data-hs-theme-appearance="default">
                <img class="navbar-brand-logo-mini" src="assets/svg/logos-light/logo-short.svg" alt="Logo" data-hs-theme-appearance="dark">
            </a>

            <!-- End Logo -->

            <!-- Navbar Vertical Toggle -->
            <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
            </button>

            <!-- End Navbar Vertical Toggle -->

            <!-- Content -->
            <div class="navbar-vertical-content">
                <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
                    <div class="nav-item">
                        <a class="nav-link dropdown-toggle {{ ($activePage == 'dash_general' || $activePage == 'dash_encuesta' || $activePage == 'dash_sucursal')? '': 'collapsed'}}" href="#navbarVerticalDash" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalDash" aria-expanded="{{ ($activePage == 'dash_general'  || $activePage == 'dash_encuesta' || $activePage == 'dash_sucursal')? 'true': 'false'}}" aria-controls="navbarVerticalDash">
                            <i class="bi-bar-chart-steps nav-icon"></i>
                            <span class="nav-link-title">Dashboard</span>
                        </a>

                        <div id="navbarVerticalDash" class="nav-collapse collapse {{ ($activePage == 'dash_general' || $activePage == 'dash_encuesta' || $activePage == 'dash_sucursal')? 'show': ''}}" data-bs-parent="#navbarVerticalMenuPagesMenu">
                            <a class="nav-link {{ ($activePage == 'dash_general')? 'active': ''}}" href="{{ url('dashboard') }}">General</a>
                            <a class="nav-link {{ ($activePage == 'dash_encuesta')? 'active': ''}}" href="{{ url('dashboardEncuesta') }}">Encuestas</a>
                            <a class="nav-link {{ ($activePage == 'dash_sucursal')? 'active': ''}}" href="{{ url('dashboardEncuestaSuc') }}">Sucursales</a>
                        </div>
                    </div>

                    <div class="nav-item">
                        <a class="nav-link dropdown-toggle {{ ($activePage == 'encuestas' || $activePage == 'categorias')? '': 'collapsed'}}" href="#navbarMenuBlog" role="button" data-bs-toggle="collapse" data-bs-target="#navbarMenuBlog" aria-expanded=" {{ ($activePage == 'encuestas' || $activePage == 'respuestas')? 'true': 'false'}}" aria-controls="navbarMenuBlog">
                            <i class="bi-file-richtext nav-icon"></i>
                            <span class="nav-link-title">Encuestas</span>
                        </a>

                        <div id="navbarMenuBlog" class="nav-collapse collapse  {{ ($activePage == 'encuestas' || $activePage == 'respuestas')? 'show': ''}}" data-bs-parent="#navbarVerticalMenuPagesMenu">
                            <a class="nav-link {{ ($activePage == 'encuestas')? 'active': ''}}" href="{{ route('encuestas.index') }}">Encuestas</a>
                            <a class="nav-link {{ ($activePage == 'respuestas')? 'active': ''}}" href="{{ route('respuestas.index') }}">Respuestas</a>
                        </div>
                    </div>

                    <div class="nav-item">
                        <a class="nav-link {{ ($activePage == 'empresas')? 'active': ''}}" href="{{ route('sucursales.index') }}" data-placement="left">
                            <i class="bi-house nav-icon"></i>
                            <span class="nav-link-title">Sucursales</span>
                        </a>
                    </div>
                    
                    {{-- <div class="nav-item">
                        <a class="nav-link dropdown-toggle {{ ($activePage == 'post' || $activePage == 'categorias'|| $activePage == 'tags')? '': 'collapsed'}}" href="#navbarMenuBlog" role="button" data-bs-toggle="collapse" data-bs-target="#navbarMenuBlog" aria-expanded=" {{ ($activePage == 'usuarios')? 'true': 'false'}}" aria-controls="navbarMenuBlog">
                            <i class="bi-file-richtext nav-icon"></i>
                            <span class="nav-link-title">Blog</span>
                        </a>

                        <div id="navbarMenuBlog" class="nav-collapse collapse  {{ ($activePage == 'post' || $activePage == 'categorias'|| $activePage == 'tags')? 'show': ''}}" data-bs-parent="#navbarVerticalMenuPagesMenu">
                            <a class="nav-link {{ ($activePage == 'post')? 'active': ''}}" href="{{ route('posts.index') }}">Articulos</a>
                            <a class="nav-link {{ ($activePage == 'categorias')? 'active': ''}}" href="{{ route('categorias.index') }}">Categorías</a>
                            <a class="nav-link {{ ($activePage == 'tags')? 'active': ''}}" href="{{ route('tags.index') }}">Tags</a>
                        </div>
                    </div> --}}
                    
                    <div class="nav-item">
                        <a class="nav-link dropdown-toggle {{ ($activePage == 'usuarios' || $activePage == 'perfil')? '': 'collapsed'}}" href="#navbarVerticalMenuPagesUsersMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesUsersMenu" aria-expanded=" {{ ($activePage == 'usuarios')? 'true': 'false'}}" aria-controls="navbarVerticalMenuPagesUsersMenu">
                            <i class="bi-gear nav-icon"></i>
                            <span class="nav-link-title">Configuración</span>
                        </a>

                        <div id="navbarVerticalMenuPagesUsersMenu" class="nav-collapse collapse  {{ ($activePage == 'usuarios' || $activePage == 'perfil')? 'show': ''}}" data-bs-parent="#navbarVerticalMenuPagesMenu">
                            <a class="nav-link {{ ($activePage == 'usuarios')? 'active': ''}}" href="{{ route('usuarios.index') }}">Usuarios</a>
                            <a class="nav-link {{ ($activePage == 'perfil')? 'active': ''}}" href="{{ route('perfil.index') }}">Perfil</a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Content -->
        </div>
    </div>
</aside>
