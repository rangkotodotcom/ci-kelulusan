</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="alert" data-flashdata="<?= $this->session->flashdata('alert'); ?>"></div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Teknisi SMAN 1 2x11 ENAM LINGKUNG 2019</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

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
                <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Ingin Keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" jika kamu yakin dan ingin keluar dari web ini!.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/'); ?>logout">Logout</a>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- timeline -->
<script src="<?= base_url('assets/') ?>vendor/timeline/dist/js/timeline.min.js"></script>
<script>
    $('.timeline').timeline({
        forceVerticalMode: 800,
        mode: 'vertical',
        visibleItems: 4
    });
</script>

<!-- CkEditor -->
<script src="<?= base_url('assets/') ?>js/ckeditor/ckeditor.js"></script>
<script src="<?= base_url('assets/') ?>js/ckeditor/build-config.js"></script>
<script src="<?= base_url('assets/') ?>js/ckeditor/config.js"></script>
<script src="<?= base_url('assets/') ?>js/ckeditor/contents.js"></script>
<script src="<?= base_url('assets/') ?>js/ckeditor/styles.js"></script>
<script>
    CKEDITOR.replace('isi');
</script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/') ?>js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
<script src="<?= base_url('assets/') ?>js/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/') ?>js/alert2.js"></script>

<!-- Page level plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>

<script>
    $('.costum-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.costum-file-label').addClass("selected").html(fileName);
    });

    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Sudah Bisa", "Satu Adm Lagi", "Belum Bisa"],
            datasets: [{
                data: [<?= $sudahbisa ?>, <?= $satuadmlagi ?>, <?= $tidakbisa ?>],
                backgroundColor: ['#4e73df', '#1cc88a', 'red'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 75,
        },
    });
</script>

</body>

</html>