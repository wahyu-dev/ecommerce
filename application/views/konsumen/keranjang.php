<div class="container-fluid" style="min-height:500px;">

    <?php if ($this->cart->contents()) : ?>

        <div class="row">
            <div class="col-md-12">
                <h4>Keranjang belanja</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Sub Total</th>
                        </tr>
                        <?php $no = 1; ?>
                        <?php foreach ($this->cart->contents() as $items) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $items['name']; ?></td>
                                <td><?= $items['qty']; ?></td>
                                <td>Rp. <?= number_format($items['price'], 0, ',', '.'); ?></td>
                                <td>Rp . <?= number_format($items['subtotal'], 0, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td>Grand total</td>
                            <td colspan="3"></td>
                            <td>Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></td>
                        </tr>
                    </table>

                </div>


                <div align="right">
                    <a href="<?= base_url('konsumen/hapus_keranjang') ?>" class="text-danger">
                        <div class="btn btn-danger">Hapus keranjang</div>
                    </a>
                    <a href="<?= base_url('konsumen') ?>">
                        <div class="btn btn-primary"> Lanjutkan belanja </div>
                    </a>
                    <a href="<?= base_url('konsumen/pembayaran') ?>">
                        <div class="btn btn-info"> pembayaran </div>
                    </a>
                </div>


            <?php else : ?>
                <br><br>
                <div class="container">
                    <h4 class="alert alert-danger">Keranjang belanja anda masih kosong</h4>
                    <a href="<?= base_url('konsumen') ?>">
                        <div class="btn btn-primary float-right"> Silahkan Belanja terlebih dahulu ! </div>
                    </a>
                </div>
            <?php endif; ?>
            </div>
        </div>
</div>
</div>