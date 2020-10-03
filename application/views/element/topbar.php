<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow fixed-top">

            <ul class="navbar-nav mr-4">
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow mr-5">
                    <a class="nav-link dropdown-toggle" href="<?= base_url('home') ?>" id="userDropdown" role="button">
                        <img style="width:70px;" class="ml-n2 mr-2" src="<?= base_url('assets/img/logo1.png') ?>">
                    </a>

                </li>
            </ul>

            <!-- Topbar Search -->
            <form action="" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-auto my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" name="keyword" id="keyword" class="form-control bg-light border-0 small" placeholder="Cari nama / kategori produk ..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary btn-sm" type="submit">
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
                        <form method="post" class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control bg-light border-0 small" placeholder="Nama / kategori sepatu..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li>
                    <button class="nav-link mt-3 text-gray-600 small" data-toggle="modal" data-target="#formModal">Login</button>
                </li>

                <li class="nav-link mt-3 text-gray-600 small">|</li>

                <li>
                    <button class="nav-link mt-3 text-gray-600 small" data-toggle="modal" data-target="#daftarModal">Daftar</button>
                </li>




            </ul>

        </nav>
        <!-- End of Topbar -->

        <br><br>

        <!-- Modal login -->
        <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Form login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-signin" action="<?= base_url('home/login'); ?>" method="post">
                        <div class="modal-body">
                            <h1 class="h3 mb-3 font-weight-normal text-center">Please sign in</h1>
                            <label for="inputEmail" class="sr-only">Email address</label>
                            <input type="text" class="form-control mb-2" placeholder="Username" name="email" required autofocus>
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- modal daftar -->
        <div class="modal fade" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Form Daftar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('home/daftar') ?>" method="post">
                        <div class="modal-body">
                            <h1 class="h3 mb-3 font-weight-normal text-center">Please register</h1>

                            <input type="hidden" class="form-control" name="kd_konsumen" id="kd_konsumen" value="<?= $kd_ks; ?>">
                            <input type="text" class="form-control mb-2" placeholder="Email" name="email" required autofocus>
                            <input type="password" class="form-control mb-2" placeholder="Password" name="password1" required>
                            <input type="password" name="password2" placeholder="Konfirmasi pasword" class="form-control mb-2" required>

                            <label for="">Nama Pengguna</label>
                            <div class="row mb-2">
                                <div class="col-lg-6 mb-2">
                                    <input type="text" class="form-control" placeholder="Nama depan" name="nama_depan" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" placeholder="Nama belakang" name="nama_belakang" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="provinsi">Provinsi</label>
                                    <select name="kd_prov" id="provinsi" class="form-control" required>
                                        <option value="">Pilih</option>
                                        <?php
                                        foreach ($provinsi as $data) { // Lakukan looping pada variabel pelanggan dari controller
                                            echo "<option value='" . $data->kd_prov . "'>" . $data->nama_prov . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-6">

                                    <label for="lastName">Kota</label>
                                    <select name="kd_kota" id="kota" class="custom-select" required>
                                        <option value="">Pilih</option>
                                    </select>

                                    <!-- <select name="kd_kota" id="kd_kota" class="form-control">
                                        <?php foreach ($kd_kota as $kota) : ?>
                                        <option value="<?= $kota['kd_kota'] ?>"><?= $kota['nama_kota']; ?></option>
                                        <?php endforeach; ?>
                                    </select> -->
                                </div>
                            </div>

                            <input type="text" name="alamat" id="alamat" placeholder="Masukan alamat anda" class="form-control mb-2 mt-2">
                            <input type="text" name="kd_pos" id="kd_pos" placeholder="Kode pos" class="form-control mb-2">
                            <input type="text" name="telp" id="telp" placeholder="Telepon" class="form-control">
                        </div>

                        <input type="hidden" name="foto" id="foto" value="default.png">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>