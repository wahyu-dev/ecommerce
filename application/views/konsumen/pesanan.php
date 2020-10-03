<div class="container" style="min-height:700px;">
    <div class="card shadow">
        <h5 class="card-header">Pesanan anda</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Nama barang</th>
                        <th>Jumlah</th>
                        <th>Harga satuan</th>
                        <th>Sub - total</th>
                        <th>Status</th>
                    </tr>

                    <?php
                    $total = 0;
                    foreach ($pesanan as $psn) :
                        $subtotal = $psn['jumlah'] * $psn['harga'];
                        $total += $subtotal;
                        ?>

                        <tr>
                            <td><?= $psn['nama_barang']; ?></td>
                            <td><?= $psn['jumlah']; ?></td>
                            <td>Rp. <?= number_format($psn['harga'], 0, ',', '.'); ?></td>
                            <td>Rp. <?= number_format($subtotal, 0, ',', '.'); ?></td>
                            <td><?= $psn['status']; ?></td>
                        </tr>
                    <?php endforeach; ?>

                    <tr>
                        <td colspan="4" align="right">Anda telah belanja sebanyak :</td>
                        <td align="right">Rp. <?= number_format($total, 0, ',', '.'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="<?= base_url('konsumen') ?>" class="btn btn-primary">Kembali</a>
            <a href="<?= base_url('konsumen/delete_pesanan/') . $user['nama_depan']; ?>" class="btn btn-danger">Delete pesanan</a>
        </div>
    </div>
</div>