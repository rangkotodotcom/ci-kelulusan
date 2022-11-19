<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Data Siswa</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-user"></i>
        Data Diri Siswa</div>
    <div class="card-body">
        <a class="btn btn-success btn-sm mb-3" href="<?= base_url('master/datadiri/add'); ?>">Tambah</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>No Peserta</th>
                        <th>NISN</th>
                        <th>Jurusan</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($datadiri as $dd) : ?>

                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $dd->nama ?></td>
                            <td><?= $dd->no_pes ?></td>
                            <td><?= $dd->nisn ?></td>
                            <td align="center">
                                <?php if ($dd->jurusan == 'A') { ?>
                                    IPA
                                <?php } else { ?>
                                    IPS
                                <?php } ?>
                            </td>
                            <td>
                                <a href="<?= base_url('master/datadiri/detail/') . $dd->id; ?>" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?= base_url('master/datadiri/edit/') . $dd->id; ?>" class="btn btn-success btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('master/datadiri/delete/') . $dd->id; ?>" class="btn btn-danger btn-sm tombol-hapus">
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