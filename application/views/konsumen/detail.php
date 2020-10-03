<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <h5 class="card-header">Info Produk</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="det_foto">
                                <a href="<?= base_url('assets/img/') . $det_barang['foto'] ?>"><img class="d_foto" src="<?= base_url('assets/img/') . $det_barang['foto'] ?>"></a>
                            </div>
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
                    <a href="<?= base_url('konsumen') ?>" class="btn btn-primary">Kembali</a>
                    <a href="https://wa.me/6283805873098?text=Ready?" target="_blank" class="btn btn-success"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>