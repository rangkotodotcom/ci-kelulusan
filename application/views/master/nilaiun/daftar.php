<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Data UN Siswa</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Daftar Nilai UN Siswa</div>
    <div class="card-body">
        <a class="btn btn-success btn-sm mb-3" href="<?= base_url('master/nilaiun/add'); ?>">Tambah</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No Peserta</th>
                        <th>Mapel Pilihan</th>
                        <th>B. Indonesia</th>
                        <th>B. Inggris</th>
                        <th>Matematika</th>
                        <th>Pilihan</th>
                        <th>Keterangan</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($nilaiun as $nu) : ?>

                        <tr>
                            <td><?= $nu->no_pes ?></td>
                            <td><?= $nu->mapel_pil ?></td>
                            <td><?= $nu->bin ?></td>
                            <td><?= $nu->bing ?></td>
                            <td><?= $nu->mat ?></td>
                            <td><?= $nu->pil ?></td>
                            <td align="center">
                                <?php if ($nu->ket == 'L') { ?>
                                    <div class="badge badge-success">Lulus</div>
                                <?php } else { ?>
                                    <div class="badge badge-danger">Tidak Lulus</div>
                                <?php } ?>
                            </td>
                            <td>
                                <a href="<?= base_url('master/nilaiun/edit/') . $nu->no_pes; ?>" class="btn btn-success btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('master/nilaiun/delete/') . $nu->no_pes; ?>" class="btn btn-danger btn-sm tombol-hapus">
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