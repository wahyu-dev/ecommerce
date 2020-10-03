<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

    <div class="row">
        <div class="col-md-8">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Data Barang</h1>
        </div>
        <div class="col-md-4">
            <button class="btn float-right mb-3 addNewMenu" style="background-color:rgb(34,133,254);color:whitesmoke" data-toggle="modal" data-target="#newMenuModal">Tambah Data</button>
        </div>
    </div>
    <div class="table-responsive shadow-sm">
        <table class="table table-striped table-hover mt-3">
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Bahan</th>
                <th>Warna</th>
                <th>Harga</th>
                <th>Keyword</th>
                <th>kode kategori</th>
                <th>Diskon</th>
                <th class="text-center">Aksi</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($barang as $brg) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><img class="img rounded-circle" src="<?= base_url('assets/img') ?>/<?= $brg['foto']; ?>" style="width:50px;height:50px;"></td>
                    <td><?= $brg['kd_brg']; ?></td>
                    <td><?= $brg['nama_barang']; ?></td>
                    <td><?= $brg['bahan']; ?></td>
                    <td><?= $brg['warna']; ?></td>
                    <td>Rp.<?= number_format($brg['harga'], 0, ',', '.'); ?></td>
                    <td><?= $brg['keyword']; ?></td>
                    <td><?= $brg['kd_kategori']; ?></td>
                    <td><?= $brg['diskon']; ?></td>
                    <td colspan="3">
                        <a href="<?= base_url(); ?>admin/ubah/<?= $brg['kd_brg']; ?>" class="text-primary"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url(); ?>admin/hapus/<?= $brg['kd_brg']; ?>" onclick="return confirm('yakin ?')" class="text-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal tambah-->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="MenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="MenuModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/tambah'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="text" name="kd_brg" class="form-control mb-2" readonly value="<?= $kode; ?>">

                    <div class="form-group">
                        <input type="text" name="nama_barang" id="nama_barang" placeholder="Nama barang" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="bahan" id="bahan" placeholder="Nama Bahan" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="warna" id="warna" placeholder="Warna" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="harga" id="harga" placeholder="Harga" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="keyword" id="keyword" placeholder="Keyword" class="form-control">
                    </div>

                    <!-- <div class="form-group">
                        <input type="text" name="kd_kategori" id="kd_kategori" placeholder="Kode Kategori" class="form-control">
                    </div> -->

                    <select name="kd_kategori" id="kd_kategori" class="form-control" required>
                        <option value="">Pilih kategori</option>
                        <?php
                        foreach ($kategori as $data) { // Lakukan looping pada variabel pelanggan dari controller
                            echo "<option value='" . $data['kd_kategori'] . "'>" . $data['nama_kategori'] . "</option>";
                        }
                        ?>
                    </select>

                    <div class="form-group mt-3">
                        <input type="text" name="diskon" id="diskon" placeholder="Diskon" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="file" name="foto" id="foto" placeholder="Foto" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="ukuran" id="ukuran" placeholder="Ukuran" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="berat" id="berat" placeholder="Berat" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="text" name="stok" id="stok" placeholder="Stok" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>