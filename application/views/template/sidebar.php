<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #2a5d68;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('admin') ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('/assets/img/logo/LOGO GEREJA BAPTIS KLATEN1.png') ?>" class="img-circle elevation-2" width="40" height="43">
        </div>
        <div class="sidebar-brand-text mx-3">Admin Page</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider" style="border-color: #7dbbb9;">

    <!-- Heading -->
    <div class="sidebar-heading" style="color: #fafafa;">
        Menu Admin
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('tentang'); ?>">
            <i class="fas fa-fw fa-church"></i>
            <span>About</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('agenda'); ?>">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>Agenda</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('informasi'); ?>">
            <i class="fas fa-fw fa-book"></i>
            <span>Informasi</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('galeri'); ?>">
            <i class="fas fa-fw fa-image"></i>
            <span>Galeri</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kontak'); ?>">
            <i class="fas fa-fw fa-phone"></i>
            <span>Kontak</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('renungan'); ?>">
            <i class="fas fa-fw fa-bookmark"></i>
            <span>Renungan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('jadwal'); ?>">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Jadwal Ibadah</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" style="border-color: #7dbbb9;">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" style="border-color: #7dbbb9;">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->