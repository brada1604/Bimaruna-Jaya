<?php 
    $request = \Config\Services::request();
    $url1 = $request->uri->getSegment(1);
    $url2 = $request->uri->getSegment(2);
?>
<?= isset($_POST['name']) ? $_POST['name'] : null?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Absensi</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item  <?= ($url1 == 'dashboard') ? "active" : "";?>">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <?php if ($session->get('role') == 1 || $session->get('role') == 2 || $session->get('role') == 3): ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Khusus
            </div>
            <?php endif ?>

            <?php if ($session->get('role') == 1 || $session->get('role') == 2): ?>
                <li class="nav-item <?= ($url1 == 'absen_master') ? "active" : "";?>">
                    <a class="nav-link" href="/absen_master">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Absen</span></a>
                </li>

                <li class="nav-item <?= ($url1 == 'scanner_master') ? "active" : "";?>">
                    <a class="nav-link" href="/scanner_master">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Scanner</span></a>
                </li>
            <?php endif ?>

            <?php if ($session->get('role') == 3): ?>
                <li class="nav-item <?= ($url1 == 'absen_master_pegawai') ? "active" : "";?>">
                    <a class="nav-link" href="/absen_master_pegawai">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Absen</span></a>
                </li>
            <?php endif ?>

            <?php if ($session->get('role') == 1 || $session->get('role') == 2 || $session->get('role') == 3): ?>
                <li class="nav-item <?= ($url1 == 'surat_master') ? "active" : "";?>">
                    <a class="nav-link" href="/surat_master">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Surat</span></a>
                </li>
            <?php endif ?>


            <?php if ($session->get('role') == 1 || $session->get('role') == 2): ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Umum
            </div>
            <?php endif ?>

            <?php if ($session->get('role') == 1 || $session->get('role') == 2): ?>
                <li class="nav-item <?= ($url1 == 'pegawai_master') ? "active" : "";?>">
                    <a class="nav-link" href="/pegawai_master">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Pegawai</span></a>
                </li>
            <?php endif ?>

            <?php if ($session->get('role') == 1): ?>
                <li class="nav-item <?= ($url1 == 'user_master' || ($url1 == 'user' && ($url2 == 'add' || $url2 == 'edit'))) ? "active" : "";?>">
                    <a class="nav-link" href="/user_master">
                        <i class="fas fa-fw  fa-folder"></i>
                        <span>User</span></a>
                </li>
            <?php endif ?>   

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengaturan
            </div>

            <?php if ($session->get('role') == 3): ?>
                <li class="nav-item <?= ($url1 == 'identitas_master') ? "active" : "";?>">
                    <a class="nav-link" href="/identitas_master">
                        <i class="fas fa-fw  fa-user"></i>
                        <span>Identitas</span></a>
                </li>
            <?php endif ?>   

            <!-- Nav Item - Tables -->
            <li class="nav-item <?= ($url1 == 'user' && $url2 == 'profil') ? "active" : "";?>">
                <a class="nav-link" href="/user/profil">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profil</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->