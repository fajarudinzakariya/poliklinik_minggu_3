<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
        <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $username ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Menu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <?php
                    if ($_SESSION['akses'] == "admin") {
                    ?>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="dokter.php" class="nav-link">
                                <i class="fas fa-solid fa-user-nurse nav-icon"></i>
                                <p>Dokter <span class="right badge badge-danger">Admin</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="poli.php" class="nav-link">
                                <i class="fas fa-solid fa-hospital nav-icon"></i>
                                <p>Poli <span class="right badge badge-danger">Admin</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="obat.php" class="nav-link">
                                <i class="fas fa-solid fa-tablets nav-icon"></i>
                                <p>Obat <span class="right badge badge-danger">Admin</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pasien.php" class="nav-link">
                                <i class="fas fa-solid fa-user nav-icon"></i>
                                <p>Pasien <span class="right badge badge-danger">Admin</span></p>
                            </a>
                        </li>
                    </ul>
                    <?php } else if($_SESSION['akses']=="dokter"){ ?>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="jadwalPeriksa.php" class="nav-link">
                                <i class="fas fa-solid fa-hospital-user nav-icon"></i>
                                <p>Jadwal Periksa <span class="right badge badge-success">Dokter</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="periksaPasien.php" class="nav-link">
                                <i class="fas fa-solid fa-stethoscope nav-icon"></i>
                                <p>Memeriksa Pasien <span class="right badge badge-success">Dokter</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="riwayatPasien.php" class="nav-link">
                                <i class="fas fa-solid fa-book-medical nav-icon"></i>
                                <p>Riwayat Pasien <span class="right badge badge-success">Dokter</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="profileDokter.php" class="nav-link">
                                <i class="fas fa-solid fa-user-nurse nav-icon"></i>
                                <p>Profile <span class="right badge badge-success">Dokter</span></p>
                            </a>
                        </li>
                    </ul>
                    <?php } else if($_SESSION['akses'] == "pasien"){?>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link">
                                <i class="fas fa-solid fa-hospital-user nav-icon"></i>
                                <p>Dashboard <span class="right badge badge-info">Pasien</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="daftarPoliklinik.php" class="nav-link">
                                <i class="fas fa-solid fa-stethoscope nav-icon"></i>
                                <p>Daftar Poli <span class="right badge badge-info">Pasien</span></p>
                            </a>
                        </li>
                    </ul>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <a href="pages/logout/logout.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>