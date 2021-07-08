<a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-toggle="dropdown">
    <span class="avatar" style="background-image: url({{ asset('template/admin/static/avatars/000m.jpg') }})"></span>
    <div class="d-none d-xl-block pl-2">
        <div>{{ session('name') }}</div>
        <div class="mt-1 small text-muted">{{ session('email') }}</div>
    </div>
</a>
<div class="dropdown-menu dropdown-menu-right mt-2">
    <a class="dropdown-item" href="#">
        <i class="nav-icon fas fa-user"></i>
        Profil
    </a>
    <div class="dropdown-divider"></div>
    <button class="dropdown-item" data-toggle="modal" data-target="#modal-keluar">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        Logout
    </button>
</div>