<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Tahun Data</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-clock"></i>
        Tahun Data Aktif</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Tahun Data</th>
                        <th width="5%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($system as $sy) : ?>

                        <tr>
                            <td>1.</td>
                            <td><?= $sy->tahun_data ?></td>
                            <td align="center">
                                <a href="<?= base_url('master/tahundata/edit/') . $sy->id; ?>" class="btn btn-success btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Akses Utama</th>
                        <th width="5%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($system as $sy) : ?>

                        <tr>
                            <td>1.</td>
                            <td><?= $sy->akses ?></td>
                            <td align="center">
                                <a href="<?= base_url('master/tahundata/edit_akses/') . $sy->id; ?>" class="btn btn-success btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>