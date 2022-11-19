<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Data Rapor Siswa</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Daftar Nilai Rapor Siswa</div>
    <div class="card-body">
        <a class="btn btn-success btn-sm mb-3" href="<?= base_url('master/nilairapor/add'); ?>">Tambah</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No Peserta</th>
                        <th>PAI</th>
                        <th>PPKN</th>
                        <th>IND</th>
                        <th>MTK</th>
                        <th>SEJIND</th>
                        <th>ING</th>
                        <th>SENBUD</th>
                        <th>PJOK</th>
                        <th>PKWU</th>
                        <th>MAT / SEJ</th>
                        <th>FIS / EKO</th>
                        <th>KIM /SOS</th>
                        <th>BIO / GEO</th>
                        <th>LM</th>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($nilairapor as $rr) : ?>

                        <tr>
                            <td><?= $rr->no_pes ?></td>
                            <td><?= $rr->pai ?></td>
                            <td><?= $rr->ppkn ?></td>
                            <td><?= $rr->ind ?></td>
                            <td><?= $rr->mtk ?></td>
                            <td><?= $rr->sejind ?></td>
                            <td><?= $rr->ing ?></td>
                            <td><?= $rr->senbud ?></td>
                            <td><?= $rr->pjok ?></td>
                            <td><?= $rr->pkwu ?></td>
                            <td><?= $rr->mat_sej ?></td>
                            <td><?= $rr->fis_eko ?></td>
                            <td><?= $rr->kim_sos ?></td>
                            <td><?= $rr->bio_geo ?></td>
                            <td><?= $rr->lm ?></td>
                            <td>
                                <a href="<?= base_url('master/nilairapor/edit/') . $rr->no_pes; ?>" class="btn btn-success btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('master/nilairapor/delete/') . $rr->no_pes; ?>" class="btn btn-danger btn-sm tombol-hapus">
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