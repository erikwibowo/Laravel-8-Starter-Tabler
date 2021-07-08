<aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="." class="navbar-brand navbar-brand-autodark">
            <img src="{{ asset('template/admin/static/logo-white.svg') }}" alt="Tabler" class="navbar-brand-image">
        </a>
        <div class="navbar-nav flex-row d-lg-none">
            <div class="nav-item dropdown">
                @include('admin.layouts.profile')
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav pt-lg-3">
                <li class="nav-item {{ empty(Request::segment(2)) ? 'active':'' }}">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}" >
                        <i class="nav-icon fas fa-home"></i>
                        <span class="nav-link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::segment(2) == 'admin' ? 'active':'' }}">
                    <a class="nav-link" href="{{ route('admin.index') }}" >
                        <i class="nav-icon fas fa-user"></i>
                        <span class="nav-link-title">Admin</span>
                    </a>
                </li>
                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-layout" data-toggle="dropdown" role="button" aria-expanded="true" >
                        <i class="nav-icon fas fa-th-large"></i>
                        <span class="nav-link-title">
                            Layout
                        </span>
                    </a>
                    <ul class="dropdown-menu show">
                        <li >
                            <a class="dropdown-item active" href="{{ asset('template/admin/layout-fluid-vertical.html') }}" >
                                Fluid vertical
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</aside>