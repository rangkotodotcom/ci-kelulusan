<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Data Admin</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Daftar Admin</div>
    <div class="card-body">
        <a class="btn btn-success btn-sm mb-3" href="<?= base_url('master/dataadmin/add'); ?>">Tambah</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dataadmin as $da) : ?>

                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $da->nama ?></td>
                            <td><?= $da->email ?></td>
                            <td>
                                <?php if ($da->level == 'admin') {
                                    echo "Admin";
                                } else if ($da->level == 'pp') {
                                    echo "Pustaka";
                                } else {
                                    echo "Tata Usaha";
                                } ?>
                            </td>
                            <td>
                                <?php if ($this->session->userdata('email') != $da->email) { ?>
                                    <a href="<?= base_url('master/dataadmin/detail/') . $da->id; ?>" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?= base_url('master/dataadmin/edit/') . $da->id; ?>" class="btn btn-success btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('master/dataadmin/delete/') . $da->id; ?>" class="btn btn-danger btn-sm tombol-hapus">
                                        <i class="fas fa-eraser"></i>
                                    </a>
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