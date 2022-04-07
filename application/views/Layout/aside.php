<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url('asset/AdminLTE/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Toko AGUS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            </div>
            <div class="info">
                <a href="#" class="d-block">INVENTORY</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('ControllerDashboard') ?>" class="nav-link   <?php if ($this->uri->segment(1) == 'ControllerDashboard') {
                                                                                            echo 'active';
                                                                                        }  ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'controllerDataMaster') {
                                                        echo 'menu-open';
                                                    }  ?>">

                    <a href="#" class="nav-link <?php if ($this->uri->segment(1) == 'controllerDataMaster') {
                                                    echo 'active';
                                                }  ?>">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Kelola Data Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('controllerDataMaster/user') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'controllerDataMaster' && $this->uri->segment(2) == 'user') {
                                                                                                        echo 'active';
                                                                                                    }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('controllerDataMaster/supplier') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'controllerDataMaster' && $this->uri->segment(2) == 'supplier') {
                                                                                                            echo 'active';
                                                                                                        }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Supplier</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('controllerDataMaster/kategori') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'controllerDataMaster' && $this->uri->segment(2) == 'kategori') {
                                                                                                            echo 'active';
                                                                                                        }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('controllerDataMaster/produk') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'controllerDataMaster' && $this->uri->segment(2) == 'produk') {
                                                                                                            echo 'active';
                                                                                                        }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produk</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'ControllerPengelolaanBarang') {
                                                        echo 'menu-open';
                                                    }  ?>">

                    <a href="#" class="nav-link <?php if ($this->uri->segment(1) == 'ControllerPengelolaanBarang') {
                                                    echo 'active';
                                                }  ?>">
                        <i class="nav-icon fas fa-feather"></i>
                        <p>
                            Kelola Produk
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('ControllerPengelolaanBarang/barang_masuk') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'ControllerPengelolaanBarang' && $this->uri->segment(2) == 'barang_masuk') {
                                                                                                                        echo 'active';
                                                                                                                    }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produk Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('ControllerPengelolaanBarang/barang_keluar') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'ControllerPengelolaanBarang' && $this->uri->segment(2) == 'barang_keluar') {
                                                                                                                        echo 'active';
                                                                                                                    }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produk Keluar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('ControllerLogin/logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>SignOut</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>