<div class="container-fluid" style="min-height:300px;">
    <div class="row">
        <div class="container">
            <div class="col-sm-12">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="card shadow">
                    <h5 class="card-header">Profile Anda</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img src="<?= base_url('assets/img/profile/') . $profile['foto']; ?>" width="200" height="200">
                            </div>
                            <div class="mt-2 col-md-8">
                                <table class="table table-hover">
                                    <tr>
                                        <td>Nama lengkap</td>
                                        <td><strong><?= $profile['nama_depan'] . " " . $profile['nama_belakang']; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td><strong><?= $profile['alamat']; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Kode pos</td>
                                        <td><strong><?= $profile['kd_pos']; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td><strong><?= $profile['telp']; ?></strong></td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="<?= base_url('konsumen') ?>" class="btn btn-primary">Kembali</a>
                        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Edit profile</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<br>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('konsumen/edit_profile') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="kd_konsumen" id="kd_konsumen" value="<?= $profile['kd_konsumen']; ?>">
                    <div class="text-center form-group">
                        <img src="<?= base_url('assets/img/profile/') . $profile['foto']; ?>" class="img rounded-circle" width="200" height="170">
                        <div class="mt-1 custom-file">
                            <input type="file" name="foto" class="custom-file-input" id="inputGroupFile02">
                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nama_depan">Nama depan</label>
                                <input type="text" class="form-control" name="nama_depan" id="nama_depan" value="<?= $profile['nama_depan'] ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nama_belakang">Nama belakang</label>
                                <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" value="<?= $profile['nama_belakang'] ?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $profile['alamat'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="kd_pos">Kode pos</label>
                        <input type="text" class="form-control" name="kd_pos" id="kd_pos" value="<?= $profile['kd_pos'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="telp">Telepon</label>
                        <input type="text" class="form-control" name="telp" id="telp" value="<?= $profile['telp'] ?>">
                    </div>
            </div>
            <div class=" modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>