<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Data Contact Person</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-address-card"></i>
        Daftar Contact Person</div>
    <div class="card-body">
        <a class="btn btn-success btn-sm mb-3" href="<?= base_url('master/cp/add'); ?>">Tambah</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>No Handphone</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($cp as $hp) : ?>

                        <tr>
                            <td><?= $hp->nama ?></td>
                            <td><?= $hp->no_hp ?></td>
                            <td>
                                <a href="<?= base_url('master/cp/edit/') . $hp->id; ?>" class="btn btn-success btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('master/cp/delete/') . $hp->id; ?>" class="btn btn-danger btn-sm tombol-hapus">
                                    <i class="fas fa-eraser"></i>
                                </a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>