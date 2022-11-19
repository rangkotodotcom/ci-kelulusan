<!-- Footer -->
<footer class="sticky-footer text-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Teknisi SMAN 1 2x11 ENAM LINGKUNG 2019</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->


<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/') ?>js/un.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/') ?>js/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/') ?>js/alert1.js"></script>

<!-- countdown -->
<script src="<?= base_url('assets/') ?>vendor/countdown/dscountdown.min.js"></script>

<?php if ($this->uri->segment(1) == "" or $this->uri->segment(1) == "hasil") { ?>
    <script>
        jQuery(document).ready(function($) {

            $('.buka').dsCountDown({
                endDate: new Date("<?= $system->waktu_pengumuman ?>"),
                theme: 'flat'
            });

        });
    </script>
<?php }

if ($this->uri->segment(2) == "grafik") {

?>

    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        // Bar Chart Example
        var ipa = document.getElementById("myBarChartIpa");
        var myBarChart = new Chart(ipa, {
            type: 'bar',
            data: {
                labels: ["B Indonesia", "B Inggris", "Matematika", "Mapel Pilihan"],
                datasets: [{
                    label: "Nilai USBN-BK",
                    backgroundColor: ['#29B0D0', '#2A516e', '#F07124', '#979193'],
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",
                    data: [<?= $grafik->pai ?>, <?= $grafik->ppkn ?>, <?= $grafik->ind ?>, <?= $grafik->mtk ?>, <?= $grafik->sejind ?>, <?= $grafik->ing ?>, <?= $grafik->senbud ?>, <?= $grafik->pjok ?>, <?= $grafik->pkwu ?>, <?= $grafik->mat_sej ?>, <?= $grafik->fis_eko ?>, <?= $grafik->kim_sos ?>, <?= $grafik->bio_geo ?>, <?= $grafik->lm ?>],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 10,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'mapel'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        },
                        maxBarThickness: 50,
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 100,
                            maxTicksLimit: 20,
                            padding: 20,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(120, 100, 0)",
                            zeroLineColor: "rgb(0, 0, 0)",
                            drawBorder: false,
                            borderDash: [10],
                            zeroLineBorderDash: [10]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 20,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                        }
                    }
                },
            }
        });
    </script>
<?php } ?>
</body>

</html>