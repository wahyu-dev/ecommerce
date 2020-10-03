<div class="container" style="margin-top:7%;">

    <div class="row mb-5">
        <?php foreach ($vkategori as $data) : ?>
            <div class="col-lg-3 mt-3">
                <div class="card">
                    <img src="<?= base_url(); ?>/assets/img/<?= $data['foto']; ?>" class="card-img-top foto_produk" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $data['nama_barang']; ?></h5>
                        <p class="card-text">Rp. <?= number_format($data['harga'], 0, ',', '.'); ?></p>
                        <a href="<?= base_url('admin/detail/') . $data['kd_brg']  ?>" class="btn btn-info btn-sm">Info Produk</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>