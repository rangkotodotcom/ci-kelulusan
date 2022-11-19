<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Izin Download</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-file-download"></i>
        Data Izin Download Nilai SKL</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>No Peserta</th>
                        <th>Akses Download</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($admsiswa as $as) : ?>

                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $as->nama ?></td>
                            <td><?= $as->no_pes ?></td>
                            <td align="center">
                                <?php if ($as->komite == '1' && $as->pustaka == '1') { ?>
                                    <span class="badge badge-success">
                                        <i class="fas fa-check-double fa-2x"></i>
                                    </span>
                                <?php } else if ($as->komite == '0' && $as->pustaka == '0') { ?>
                                    <span class="badge badge-danger">
                                        <i class="fas fa-times fa-2x"></i>
                                    </span>
                                <?php } else { ?>
                                    <span class="badge badge-warning">
                                        <i class="fas fa-check fa-2x"></i>
                                    </span>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>