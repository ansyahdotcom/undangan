<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo base_url('/Admin_controllers') ?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Manajemen Admin
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="transaksi" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Form Transaksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="template" class="nav-link">
                        <i class="nav-icon fas fa-palette"></i>
                        <p>
                            Form Template
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>