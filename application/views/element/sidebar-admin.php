<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color:rgb(34,133,254);" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Halo Admin <sup>2</sup></div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
            <i class="fas fa-database"></i>
            <span>Data barang</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('invoice'); ?>">
            <i class="fas fa-file-invoice"></i>
            <span>Invoice barang</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Kategori</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php foreach ($kategori as $data) : ?>
                    <a class="collapse-item" href="<?= base_url('admin/kategori/') . $data['kd_kategori'] ?>"><?= $data['nama_kategori']; ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->