<div class="container-fluid">
    <h4>Invoice Penjualan</h4>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>Id Invoice</th>
                <th>Nama Pengiriman</th>
                <th>Alamat Pengiriman</th>
                <th>Tanggal Pemesanan</th>
                <th>Batas Pembayaran</th>
                <th>Aksi</th>
            </tr>

            <?php foreach ($invoice as $inv) : ?>
                <tr>
                    <td><?= $inv->id; ?></td>
                    <td><?= $inv->nama; ?></td>
                    <td><?= $inv->alamat; ?></td>
                    <td><?= $inv->tgl_pesan; ?></td>
                    <td><?= $inv->batas_bayar; ?></td>
                    <td>
                        <?php echo anchor('invoice/detail/' . $inv->id, '<div class="btn btn-sm btn-primary"><i class="fas fa-eye"></i></div>');  ?>
                        <?php
                            if ($inv->status != '<p class="btn btn-success btn-sm">Pesanan telah diterima</p>') {
                                echo anchor('admin/konfirmasi_pembayaran/' . $inv->id, '<div class="btn btn-sm btn-success"><i class="fas fa-check"></i></div>');
                            }
                            ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>