<div class="container-fluid">
    <div class="card" style="margin-top:3%;margin-bottom:2%;">
        <h5 class="card-header">Info Produk</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/') . $det_barang['foto'] ?>">
                </div>
                <div class=" col-md-8">
                    <table class="table">
                        <tr>
                            <td>Nama produk</td>
                            <td><strong><?= $det_barang['nama_barang']; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Ukuran</td>
                            <td><strong><?= $det_barang['ukuran']; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Bahan</td>
                            <td><strong><?= $det_barang['bahan']; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Warna</td>
                            <td><strong><?= $det_barang['warna']; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Berat</td>
                            <td><strong><?= $det_barang['berat']; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td><strong><?= $det_barang['stok']; ?></strong></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="<?= base_url('admin/kategori/') . $det_barang['kd_kategori'] ?>" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>