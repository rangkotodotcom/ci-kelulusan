<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Bebas Tata Usaha</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-credit-card"></i>
        Data Siswa Bebas Tata Usaha</div>
    <div class="card-body">
        <a class="btn btn-success btn-sm mb-3" href="<?= base_url('page/tatausaha/add'); ?>">Tambah</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama Lengkap</th>
                        <th>No Peserta</th>
                        <th width="5%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($tatausaha as $tu) : ?>

                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $tu->nama ?></td>
                            <td><?= $tu->no_pes ?></td>
                            <td align="center">
                                <a href="<?= base_url('page/tatausaha/delete/') . $tu->no_pes; ?>" class="btn btn-danger btn-sm tombol-hapus">
                                    <i class="fas fa-eraser"></i>
                                </a>
                            </td>
                        </tr>

                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>