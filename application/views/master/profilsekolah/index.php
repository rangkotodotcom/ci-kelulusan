<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Profil Sekolah</li>
</ol>

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-9 col-lg-8">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header">
                <i class="fas fa-home"></i>
                Profil Sekolah</div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>NPSN</td>
                                <td><?= $profilsekolah->npsn ?></td>
                            </tr>
                            <tr>
                                <td>Nama Sekolah</td>
                                <td><?= $profilsekolah->nama_sekolah ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><?= $profilsekolah->alamat ?></td>
                            </tr>
                            <tr>
                                <td>Daerah Tingkat II</td>
                                <td>
                                    <?php if ($profilsekolah->daerah == 'Kab') { ?>
                                        Kabupaten
                                    <?php } else { ?>
                                        Kota
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php if ($profilsekolah->daerah == 'Kab') { ?>
                                        Kabupaten
                                    <?php } else { ?>
                                        Kota
                                    <?php } ?>
                                </td>
                                <td><?= $profilsekolah->kab_kota ?></td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td><?= $profilsekolah->prov ?></td>
                            </tr>
                            <tr>
                                <td>Kode Pos</td>
                                <td><?= $profilsekolah->kode_pos ?></td>
                            </tr>
                            <tr>
                                <td>Telp</td>
                                <td><?= $profilsekolah->telp ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?= $profilsekolah->email ?></td>
                            </tr>
                            <tr>
                                <td>Website</td>
                                <td><?= $profilsekolah->website ?></td>
                            </tr>
                            <tr>
                                <td>Kepala Sekolah</td>
                                <td><?= $profilsekolah->kepsek ?></td>
                            </tr>
                            <tr>
                                <td>NIP Kepala Sekolah</td>
                                <td><?= $profilsekolah->nip_kepsek ?></td>
                            </tr>
                            <tr>
                                <td>Tahun Ajaran</td>
                                <td><?= $profilsekolah->tahun_ajaran ?></td>
                            </tr>
                            <tr>
                                <td>Update Terakhir</td>
                                <td><?= tanggal_indo($profilsekolah->last_update) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary btn-md" href="<?= base_url('master/profilsekolah/edit/') . $profilsekolah->id; ?>">Edit</a>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-3 col-lg-4">
        <div class="row">
            <div>
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header">
                        <i class="fas fa-image"></i>
                        Logo Provinsi</div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <img src="<?= base_url('upload/logo/' . $profilsekolah->logo_prov) ?>" width="180" class="img-thumbnail" alt="Logo Provinsi" />
                        </div>
                    </div>
                </div>
                <div>
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header">
                            <i class="fas fa-image"></i>
                            Logo Sekolah
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <img src="<?= base_url('upload/logo/' . $profilsekolah->logo_sekolah) ?>" width="180" class="img-thumbnail" alt="Logo Sekolah" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>