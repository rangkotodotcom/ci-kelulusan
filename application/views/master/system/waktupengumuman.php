<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Waktu Pengumuman</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-clock"></i>
        Jadwal Pengumuman Kelulusan</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Waktu Pengumuman</th>
                        <th width="5%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($system as $sy) : ?>

                        <tr>
                            <td>1.</td>
                            <td><?= tanggal_indo($sy->waktu_pengumuman) ?></td>
                            <td align="center">
                                <a href="<?= base_url('master/waktupengumuman/edit/') . $sy->id; ?>" class="btn btn-success btn-sm">
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