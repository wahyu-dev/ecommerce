<div class="container-fluid">
    <div class="row">

        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    <h2>Form edit</h2>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="kd_brg" id="kd_brg" placeholder="Kode barang" class="form-control" value="<?= $ebarang['kd_brg']; ?>">

                        <div class="form-group">
                            <input type="text" name="nama_barang" id="nama_barang" placeholder="Nama barang" class="form-control" value="<?= $ebarang['nama_barang']; ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" name="bahan" id="bahan" placeholder="Nama Bahan" class="form-control" value="<?= $ebarang['bahan']; ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" name="warna" id="warna" placeholder="Warna" class="form-control" value="<?= $ebarang['warna']; ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" name="harga" id="harga" placeholder="Harga" class="form-control" value="<?= $ebarang['harga']; ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" name="keyword" id="keyword" placeholder="Keyword" class="form-control" value="<?= $ebarang['keyword']; ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" name="kd_kategori" id="kd_kategori" placeholder="Kode Kategori" class="form-control" value="<?= $ebarang['kd_kategori']; ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" name="diskon" id="diskon" placeholder="Diskon" class="form-control" value="<?= $ebarang['diskon']; ?>">
                        </div>

                        <!-- <input type="hidden" name="foto" id="foto" value="<?= $ebarang['foto']; ?>"> -->
                        <div class="form-group row">
                            <div class="col-lg-1">
                                <img src="<?= base_url('assets/img/') . $ebarang['foto']; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-lg-11">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto" name="foto" size="50">
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" name="ukuran" id="ukuran" placeholder="Ukuran" class="form-control" value="<?= $ebarang['ukuran']; ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" name="berat" id="berat" placeholder="Berat" class="form-control" value="<?= $ebarang['berat']; ?>">
                        </div>

                        <div class="form-group">
                            <input type="text" name="stok" id="stok" placeholder="Stok" class="form-control" value="<?= $ebarang['stok']; ?>">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right" name="edit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>