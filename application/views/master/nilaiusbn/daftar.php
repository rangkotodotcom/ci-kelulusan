<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Data USBN Siswa</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Daftar Nilai USBN Siswa
    </div>
    <div class="card-body">
        <a class="btn btn-success btn-sm mb-3" href="<?= base_url('master/nilaiusbn/add'); ?>">Tambah</a>
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
                    <?php
                    foreach ($nilaiusbn as $us) : ?>

                        <tr>
                            <td><?= $us->no_pes ?></td>
                            <td><?= $us->pai ?></td>
                            <td><?= $us->ppkn ?></td>
                            <td><?= $us->ind ?></td>
                            <td><?= $us->mtk ?></td>
                            <td><?= $us->sejind ?></td>
                            <td><?= $us->ing ?></td>
                            <td><?= $us->senbud ?></td>
                            <td><?= $us->pjok ?></td>
                            <td><?= $us->pkwu ?></td>
                            <td><?= $us->mat_sej ?></td>
                            <td><?= $us->fis_eko ?></td>
                            <td><?= $us->kim_sos ?></td>
                            <td><?= $us->bio_geo ?></td>
                            <td><?= $us->lm ?></td>
                            <td>
                                <a href="<?= base_url('master/nilaiusbn/edit/') . $us->no_pes; ?>" class="btn btn-success btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('master/nilaiusbn/delete/') . $us->no_pes; ?>" class="btn btn-danger btn-sm tombol-hapus">
                                    <i class="fas fa-eraser"></i>
                                </a>
                            </td>
                        </tr>

                    <?php
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>