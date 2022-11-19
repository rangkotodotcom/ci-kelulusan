<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">ADM Siswa</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-credit-card"></i>
        Data ADM Siswa</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>No Peserta</th>
                        <th>Tata Usaha</th>
                        <th>Perpustakaan</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($admsiswa as $as) : ?>

                        <tr>
                            <td><?= $as->nama ?></td>
                            <td><?= $as->no_pes ?></td>
                            <td align="center">
                                <?php if ($as->komite == '1') { ?>
                                    <span class="badge badge-primary">
                                        <i class="far fa-check-circle fa-2x"></i>
                                    </span>
                                <?php } else { ?>
                                    <span class="badge badge-danger">
                                        <i class="far fa-times-circle fa-2x"></i>
                                    </span>
                                <?php } ?>
                            </td>
                            <td align="center">
                                <?php if ($as->pustaka == '1') { ?>
                                    <span class="badge badge-primary">
                                        <i class="far fa-check-circle fa-2x"></i>
                                    </span>
                                <?php } else { ?>
                                    <span class="badge badge-danger">
                                        <i class="far fa-times-circle fa-2x"></i>
                                    </span>
                                <?php } ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>