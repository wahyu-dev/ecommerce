<div class="container">
    <div class="mt-5"><?= $this->session->flashdata('message'); ?></div>
    <div class="row mb-3" style="margin-top:5rem!important">

        <div class="col-lg">
            <div class="bd-example">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= base_url('assets/img/slider/banner1.png') ?>" class="d-block w-100">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Sepatu terbaru</h5>
                                <p>Mulai hidupmu dengan sesuatu yang baru.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?= base_url('assets/img/slider/banner2.png') ?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?= base_url('assets/img/slider/banner3.png') ?>" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Sepatu pilihan terbaik</h5>
                                <p>Tampilah berbeda dengan model sepatu yang baru.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mb-5">
        <?php foreach ($sepatu as $s) : ?>
            <div class="col-6 col-lg-3 col-md-6 col-sm-6 mt-3">
                <div class="card shadow h-100">
                    <a href="<?= base_url('home/detail/') . $s['kd_brg']  ?>">
                        <img src="<?= base_url(); ?>/assets/img/<?= $s['foto']; ?>" class="card-img-top foto_produk" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title text-truncate"><?= $s['nama_barang']; ?></h5>
                        <?php $harga = $s['harga'] - $s['diskon']; ?>
                        <?php if ($s['diskon'] != 0) : ?>
                            <s>
                                <p class="card-text text-danger">Rp. <?= number_format($s['harga'], 0, ',', '.'); ?></p>
                            </s>
                            <p class="card-text">Rp. <?= number_format($harga, 0, ',', '.'); ?>
                            <?php else : ?>
                                <p class="card-text">Rp. <?= number_format($s['harga'], 0, ',', '.'); ?></p>
                            <?php endif; ?>

                    </div>
                    <div class="card-footer">
                        <?php if ($s['diskon'] != 0) : ?>
                            <button class="rounded-pill mb-1 btn btn-sm btn-danger float-right">-<?= $s['diskon']; ?>%</button>
                        <?php endif; ?>
                        <a href="<?= base_url('home/detail/') . $s['kd_brg']  ?>" class="btn btn-info btn-sm">Info Produk</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>