<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="<?= base_url('master/profilsekolah'); ?>">Profil Sekolah</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Form Edit Profil Sekolah</div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg">
                <form action="<?= base_url('master/profilsekolah/edit/') . $profilsekolah->id ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $profilsekolah->id ?>">
                    <div class="form-group row">
                        <label for="npsn" class="col-sm-2 col-form-label">NPSN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="npsn" value="<?= $profilsekolah->npsn ?>" id="npsn">
                            <?= form_error('npsn', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_sekolah" class="col-sm-2 col-form-label">Nama Sekolah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_sekolah" value="<?= $profilsekolah->nama_sekolah ?>" id="nama_sekolah">
                            <?= form_error('nama_sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamat" value="<?= $profilsekolah->alamat ?>" id="alamat">
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="daerah" class="col-sm-2 col-form-label">Dati II</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="daerah" id="daerah">
                                <option value="">Daerah Tingkat II</option>
                                <option value="Kab" <?php if ($profilsekolah->daerah == 'Kab') {
                                                        echo "selected";
                                                    }  ?>>Kabupaten</option>
                                <option value="Kot" <?php if ($profilsekolah->daerah == 'Kot') {
                                                        echo "selected";
                                                    } ?>>Kota</option>
                            </select>
                            <?= form_error('daerah', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kab_kota" class="col-sm-2 col-form-label">Kab / Kota</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kab_kota" value="<?= $profilsekolah->kab_kota ?>" id="kab_kota">
                            <?= form_error('kab_kota', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="prov" class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="prov" value="<?= $profilsekolah->prov ?>" id="prov">
                            <?= form_error('prov', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kode_pos" class="col-sm-2 col-form-label">Kode Pos</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kode_pos" value="<?= $profilsekolah->kode_pos ?>" id="kode_pos">
                            <?= form_error('kode_pos', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telp" class="col-sm-2 col-form-label">Telp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="telp" value="<?= $profilsekolah->telp ?>" id="telp">
                            <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email Sekolah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="email" value="<?= $profilsekolah->email ?>" id="email">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="website" class="col-sm-2 col-form-label">Website</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="website" value="<?= $profilsekolah->website ?>" id="website">
                            <?= form_error('website', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kepsek" class="col-sm-2 col-form-label">Kepala Sekolah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kepsek" value="<?= $profilsekolah->kepsek ?>" id="kepsek">
                            <?= form_error('kepsek', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nip_kepsek" class="col-sm-2 col-form-label">NIP Kepala Sekolah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nip_kepsek" value="<?= $profilsekolah->nip_kepsek ?>" id="nip_kepsek">
                            <?= form_error('nip_kepsek', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tahun_ajaran" class="col-sm-2 col-form-label">Tahun Ajaran</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                                <option value="">Tahun Ajaran</option>
                                <?php
                                $awal_th = '2019';
                                $pecah_tahun = explode("/", $profilsekolah->tahun_ajaran);
                                $akhir = end($pecah_tahun);
                                for ($tahun = $awal_th; $tahun <= date('Y'); $tahun++) {
                                    // Skrip tahun terpilih
                                    $tahun_1 = $tahun - 1;
                                    if ($tahun == $akhir) {
                                        $cek = " selected";
                                    } else {
                                        $cek = "";
                                    }

                                    echo "<option value='$tahun_1/$tahun' $cek> $tahun_1/$tahun</option>";
                                }
                                ?>
                            </select>
                            <?= form_error('tahun_ajaran', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Logo Provinsi (ukuran max 244 x 300)</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('upload/logo/' . $profilsekolah->logo_prov) ?>" class="img-thumbnail" alt="Image">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="form-control-file" id="logo_prov" name="logo_prov">
                                        <input type="hidden" id="old_logo_prov" name="old_logo_prov" value="<?= $profilsekolah->logo_prov ?>">
                                        <label class="custom-file-label" for="logo_prov">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Logo Sekolah (ukuran max 300 x 303)</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('upload/logo/' . $profilsekolah->logo_sekolah) ?>" class="img-thumbnail" alt="Image">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="form-control-file" id="logo_sekolah" name="logo_sekolah">
                                        <input type="hidden" id="old_logo_sekolah" name="old_logo_sekolah" value="<?= $profilsekolah->logo_sekolah ?>">
                                        <label class="custom-file-label" for="logo_sekolah">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="edit" class="btn btn-primary">
                        Edit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>