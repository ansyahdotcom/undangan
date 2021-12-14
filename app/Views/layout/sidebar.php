<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
        <img src="/assets/dist/img/AdminLTELogo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Undangan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/assets/dist/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= base_url() ?>" class="d-block"><?= $username; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href=" <?php echo base_url('/Admin_controllers') ?>" class="nav-link <?php $uri = service('uri');
                                                                                            if ($uri->getSegment(1) == 'Admin_controllers') {
                                                                                                echo 'active';
                                                                                            } ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Manajemen Admin
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="transaksi" class="nav-link <?php $uri = service('uri');
                                                        if ($uri->getSegment(1) == 'transaksi') {
                                                            echo 'active';
                                                        } ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Form Transaksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="template" class="nav-link <?php $uri = service('uri');
                                                        if ($uri->getSegment(1) == 'template') {
                                                            echo 'active';
                                                        } ?>">
                        <i class="nav-icon fas fa-palette"></i>
                        <p>
                            Form Template
                        </p>
                    </a>
                </li>
                <li class="nav-item rounded bg-danger my-4">
                    <a class="nav-link" href="logout" data-toggle="modal" data-target="#logoutModal">
                        <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>