<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Informasi</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Daftar Informasi</div>
    <div class="card-body">
        <a class="btn btn-success btn-sm mb-3" href="<?= base_url('master/informasi/add'); ?>">Tambah</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Subjek</th>
                        <th>Tujuan</th>
                        <th>Tanggal Kirim</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($informasi as $im) : ?>

                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $im->subjek ?></td>
                            <td>
                                <?php if ($im->tujuan == 'all') {
                                    echo "Semua";
                                } else if ($im->tujuan == 'admin') {
                                    echo "Hanya Admin";
                                } else if ($im->tujuan == 'pp') {
                                    echo "Pustaka";
                                } else if ($im->tujuan == 'public') {
                                    echo "Public";
                                } else {
                                    echo "Tata Usaha";
                                } ?>
                            </td>
                            <td><?= tanggal_indo($im->tanggal_kirim) ?></td>
                            <td>
                                <a href="<?= base_url('master/informasi/detail/') . $im->id; ?>" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?= base_url('master/informasi/edit/') . $im->id; ?>" class="btn btn-success btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('master/informasi/delete/') . $im->id; ?>" class="btn btn-danger btn-sm tombol-hapus">
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