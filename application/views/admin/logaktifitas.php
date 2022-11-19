<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Log Aktifitas</h1>
</div>

<div class="card mb-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Aktifitas</th>
                        <th>Oleh</th>
                        <th>Waktu</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($logaktifitas as $la) : ?>

                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $la->kegiatan ?></td>
                            <td><?= $la->oleh ?></td>
                            <td><?= tanggal_indo($la->waktu); ?></td>
                        </tr>

                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>