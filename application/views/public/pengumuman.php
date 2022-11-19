<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg">
            <div class="card bg-light mx-auto" style="margin-top:100px; margin-bottom:10%;">
                <div class="card-header font-weight-bold text-center">
                    <h3>Pengumuman</h3>
                </div>
                <div class="card-body" style="min-height:300px;">
                    <?php foreach ($pengumuman as $pm) : ?>
                        <div class="card border-info mb-3">
                            <div class="card-header">
                                <span style="font-size: 25px; font-family: all;">
                                    <?= $pm->subjek ?>
                                </span>
                            </div>
                            <div class="card-body" align="left">
                                <span style="font-family: calibri; font-size: 17px;">
                                    <?= $pm->isi ?>
                                </span>
                            </div>
                            <div class="card-footer" align="right">
                                <span style="font-size: 12px; text-align: left;">
                                    Publish on <b><?= tanggal_indo($pm->tanggal_kirim); ?></b>
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>