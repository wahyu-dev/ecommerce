    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar fixed-top static-top shadow">

                <ul class="navbar-nav mr-4">
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="<?= base_url('konsumen') ?>" id="userDropdown" role="button">
                            <img style="width:70px;" class="ml-n2 mr-2" src="<?= base_url('assets/img/logo1.png') ?>">
                        </a>

                    </li>
                </ul>

                <!-- Topbar Search -->
                <form action="" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" name="keyword" id="keyword" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form action="" method="post" class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" name="keyword" id="keyword" class="form-control bg-light border-0 small" placeholder="Nama / kategori sepatu ..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-primary" type="submit">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <li class="nav-item ml-n2 dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="<?= base_url('konsumen/detail_keranjang') ?>">
                            <i class="fas fa-shopping-cart"></i>
                            <!-- Counter - Alerts -->
                            <?php $keranjang = $this->cart->total_items(); ?>
                            <span class="badge badge-danger badge-counter"><?= $keranjang; ?></span>
                        </a>
                    </li>

                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle text-primary" href="<?= base_url('konsumen/pesanan/') . $user['nama_depan']; ?>" id="alertsDropdown">
                            Pesanan
                        </a>
                    </li>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow ml-n2">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama_depan'] . ' ' . $user['nama_belakang'] ?></span>
                            <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['foto']; ?>">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= base_url('konsumen/profile'); ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->
            <br><br><br><br>