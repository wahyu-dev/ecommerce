<div class="container-fluid mb-3" style="min-height:500px;">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-success">
                <?php
                $grand_total = 0;
                if ($keranjang = $this->cart->contents()) {
                    foreach ($keranjang as $items) {
                        $grand_total = $grand_total + $items['subtotal'];
                    }
                    echo "<h4>Total belanja anda : Rp. " . number_format($grand_total, 0, ',', '.') . '</h4>';
                }
                ?>
            </div><br><br>

            <h3>Input alamat pengiriman</h3>

            <form action="<?= base_url('konsumen/proses_pesanan') ?>" method="post">
                <input type="hidden" name="kd_trans" id="kd_trans" value="<?= $kd_trans; ?>" readonly>
                <input type="hidden" name="kd_konsumen" id="kd_konsumen" readonly value="<?= $user['kd_konsumen']; ?>">
                <input type="hidden" name="nama" id="nama" value="<?= $user['nama_depan']; ?>">
                <!-- <div class="form-group">
                    <label for="nama"> Nama Lengkap </label>
                    <input class="form-control" type="text" name="nama" id="nama" placeholder="Masukan nama anda...">
                </div> -->

                <div class="form-group">
                    <label for="alamat"> Alamat Lengkap </label>
                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control" placeholder="Masukan alamat lengkap"></textarea>
                    <!-- <input class="form-control" type="text" name="alamat" id="alamat" placeholder="Masukan alamat anda..."> -->
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="provinsi">Provinsi</label>
                        <select name="kd_prov" id="provinsi" class="custom-select" required>
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
                    </div>
                </div>


                <button type="submit" class="btn btn-primary float-right mt-2" name="bayar">Pesan</button>
            </form>

        </div>
        <div class="col-md-2"></div>
    </div>
</div>