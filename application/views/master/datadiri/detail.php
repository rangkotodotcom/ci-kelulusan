<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="<?= base_url('master/datadiri'); ?>">Data Siswa</a>
    </li>
    <li class="breadcrumb-item active">Detail</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-user"></i>
        Data Diri <?= $datadiri->nama ?></div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td> : </td>
                        <td><?= $datadiri->nama ?></td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td> : </td>
                        <td><?= $datadiri->t_lahir ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td> : </td>
                        <td><?= date_indo($datadiri->tgl_lhr) ?></td>
                    </tr>
                    <tr>
                        <td>Nama Orang Tua</td>
                        <td> : </td>
                        <td><?= $datadiri->n_ortu ?></td>
                    </tr>
                    <tr>
                        <td>NIS</td>
                        <td> : </td>
                        <td><?= $datadiri->nis ?></td>
                    </tr>
                    <tr>
                        <td>NISN</td>
                        <td> : </td>
                        <td><?= $datadiri->nisn ?></td>
                    </tr>
                    <tr>
                        <td>No Peserta</td>
                        <td> : </td>
                        <td><?= $datadiri->no_pes ?></td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td> : </td>
                        <td>
                            <?php if ($datadiri->jurusan == 'A') { ?>
                                IPA
                            <?php } else { ?>
                                IPS
                            <?php } ?>
                        </td>
                    </tr>
                    <tr align="center">
                        <td colspan="3">
                            <img src="<?= $datadiri->foto ?>" width="150" class="img-thumbnail" />
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
</div>