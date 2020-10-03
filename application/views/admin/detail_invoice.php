<div class="container-fluid">
    <h4>Detail Pesanan
        <div class="btn btn-success">No. Invoice: <?php echo $invoice->id; ?></div>
    </h4>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>Kode Barang</th>
            <th>Nama</th>
            <th>Jumlah Pesanan</th>
            <th>Harga Satuan</th>
            <th>Sub - total</th>
        </tr>

        <?php
        $total = 0;
        foreach ($pesanan as $psn) :
            $subtotal = $psn->jumlah * $psn->harga;
            $total += $subtotal;
            ?>

            <tr>
                <td><?= $psn->kd_brg; ?></td>
                <td><?= $psn->nama_barang; ?></td>
                <td><?= $psn->jumlah; ?></td>
                <td>Rp. <?= number_format($psn->harga, 0, ',', '.'); ?></td>
                <td>Rp. <?= number_format($subtotal, 0, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>

        <tr>
            <td colspan="4" align="right">Grand Total</td>
            <td align="right">Rp. <?= number_format($total, 0, ',', '.'); ?></td>
        </tr>
    </table>

    <a href="<?= base_url('invoice/index') ?>">
        <div class="btn btn-primary">Kembali</div>
    </a>

</div>