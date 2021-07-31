<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">

                <div class="sidebar-brand-text mx-3">SPK PKL <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>DASHBOARD</span>
                </a>
            </li>
            <?php if ($this->session->userdata("user_logged")["role"] == 0) : ?>
                <hr class="sidebar-divider my-0">
                <li class="nav-item <?php echo $this->uri->segment(2) == 'user' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?php echo base_url('admin/user') ?>">
                        <i class="fas fa-user-circle"></i>
                        <span>Siswa</span>
                    </a>
                </li>


                <li class="nav-item <?php echo $this->uri->segment(2) == 'kriteria' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?php echo base_url('admin/kriteria') ?>">
                        <i class="fas fa-database"></i>
                        <span>Master Kriteria</span>
                    </a>
                </li>

                <li class="nav-item <?php echo $this->uri->segment(2) == 'subkriteria' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?php echo base_url('admin/subkriteria') ?>">
                        <i class="fas fa-database"></i>
                        <span>Master Sub Kriteria</span>
                    </a>
                </li>

                <li class="nav-item <?php echo $this->uri->segment(2) == 'perusahaan' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?php echo base_url('admin/perusahaan') ?>">
                        <i class="fas fa-database"></i>
                        <span>Master Perusahaan</span>
                    </a>
                </li>
                <hr class="sidebar-divider d-none d-md-block">
            <?php endif; ?>

            <?php if ($this->session->userdata("user_logged")["role"] == 1) : ?>

                <li class="nav-item <?php echo $this->uri->segment(2) == 'perbandingan' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?php echo base_url('admin/Weight/Criteria') ?>">
                        <i class="fas fa-percentage"></i>
                        <span>Perbandingan Kriteria</span>
                    </a>

                <li class="nav-item <?php echo $this->uri->segment(2) == 'perbandingan' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?php echo base_url('admin/Weight/Alternative') ?>">
                        <i class="fas fa-percentage"></i>
                        <span>Perbandingan Alternatif</span>
                    </a>
                </li>
                </li>

                <li class="nav-item <?php echo $this->uri->segment(2) == 'perbandingan' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?php echo base_url('admin/Weight/SubCriteria') ?>">
                        <i class="fas fa-percentage"></i>
                        <span>Perbandingan Sub Kriteria</span>
                    </a>
                </li>

            <?php endif; ?>

            <?php if ($this->session->userdata("user_logged")["role"] == 1) : ?>
                <hr class="sidebar-divider d-none d-md-block">
                <li class="nav-item <?php echo $this->uri->segment(2) == 'perbandingan' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?php echo base_url('admin/Rank/Personal') ?>">
                        <i class="fas fa-percentage"></i>
                        <span>Perhitungan Bobot Global</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if ($this->session->userdata("user_logged")["role"] == 0 || $this->session->userdata("user_logged")["role"] == 1) : ?>

                <li class="nav-item <?php echo $this->uri->segment(2) == 'perbandingan' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?php echo base_url('admin/Rank/Group') ?>">
                        <i class="fas fa-percentage"></i>
                        <span>Rangking</span>
                    </a>
                </li>
            <?php endif; ?>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->