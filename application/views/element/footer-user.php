<br><br>
<!-- Footer -->
<div style="background-color:#00315A">
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; My Website <?= date('Y'); ?></span>
            </div>
            <div class="mt-1">
                <div class="copyright text-center my-auto">
                    <span> <a href="https:/instagram.com/wahyudev_46" class="mr-2" style="color:gray;"><i class="fab fa-instagram"></i></a></span>
                    <span> <a href="https:/facebook.com/wahyu pratama" style="color:gray;"><i class="fab fa-facebook-f"></i></a></span>
                    <span> <a href="https:/twitter.com/wahyudev_46" class="ml-2" style="color:gray;"><i class="fab fa-twitter"></i></a></span>
                </div>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
</div>
</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Pilih "Logout" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('home/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>


<script>
    $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
        $("#provinsi").change(function() { // Ketika user mengganti atau memilih data pelanggan
            $("#kota").hide(); // Sembunyikan dulu combobox faktur nya
            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("home/listkota"); ?>", // Isi dengan url/path file php yang dituju pada controller
                data: {
                    kd_prov: $("#provinsi").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil

                    // set isi dari combobox faktur
                    // lalu munculkan kembali combobox fakturnya
                    $("#kota").html(response.list_kota).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });
    });
</script>


<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/script.min.js"></script>

<!-- Sweet alert -->
<script src="<?= base_url('assets/') ?>js/sweet/sweetalert2.all.min.js"></script>

<!-- MyScript -->
<script src="<?= base_url('assets/') ?>js/myscript.js"></script>