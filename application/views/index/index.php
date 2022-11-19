<div class="container">
    <div class="alert" data-flashdata="<?= $this->session->flashdata('alert'); ?>"></div>
    <!-- Outer Row -->
    <div class="row justify-content-center" style="margin-top: 6%">
        <div class="col-lg-7">
            <div class="card o-hidden border-0 shadow-lg my-4">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h2 text-gray-900 mb-4 font-weight-bold">Pengumuman Kelulusan</h1>
                                    <hr>
                                </div>

                                <?php if ($system->akses == 'buka') { ?>

                                    <form class="user" method="post" action="<?= base_url('index/hasil/'); ?>">
                                        <fieldset>
                                            <legend class="h5">Masukkan Nomor UNBK dan Tanggal Lahir</legend>
                                            <div class=form-group>
                                                <label>No. Peserta</label>
                                                <input name="no_pes" class="form-control" value="<?php if ($this->session->flashdata('hasil')) {
                                                                                                        echo $this->session->flashdata('hasil')['no_pes'];
                                                                                                    } else {
                                                                                                        echo set_value('no_pes');
                                                                                                    }
                                                                                                    ?>">
                                                <?= form_error('no_pes', '<small class="text-danger pl-3">', '</small>'); ?>
                                                <p class="help-block info small">No. Peserta: Tertera pada kartu peserta UNBK.</p>
                                            </div>
                                            <div class=form-group>
                                                <label>Tanggal Lahir</label>
                                                <input name="tgl_lhr" type="date" class="form-control" value="<?php if ($this->session->flashdata('hasil')) {
                                                                                                                    echo $this->session->flashdata('hasil')['tgl_lhr'];
                                                                                                                } else {
                                                                                                                    echo set_value('tgl_lhr');
                                                                                                                }
                                                                                                                ?>">
                                                <?= form_error('tgl_lhr', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </fieldset>
                                        <button name="hasil" type="submit" class="btn btn-primary">Lihat Hasil</button>
                                    </form>

                                <?php } else { ?>

                                    <fieldset align="center">
                                        <legend class="h5">Link dapat diakses dalam</legend>
                                        <div class="buka"></div>
                                    </fieldset>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    if ($this->session->flashdata('hasil')) {
        $hasil = $this->session->flashdata('hasil');
        // var_dump($hasil);

    ?>
        <div class="card border-success">
            <div class="card-header">
                <h2><b>Hasil UNBK</b></h2>
            </div>
            <div class="card-body text-success">
                <h5 class="card-title">Penting</h5>
                <p class="card-text">Silahkan periksa data diri anda. Jika ada kesalahan, segera hubungi ICT <?= $profilsekolah["nama_sekolah"] ?> untuk perbaikan data.</p>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Data Diri</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td>Nama Lengkap</td>
                                        <td><?= $hasil["nama"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Lahir</td>
                                        <td><?= $hasil["t_lahir"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td><?= date_indo($hasil["tgl_lhr"]); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Orangtua</td>
                                        <td><?= $hasil["n_ortu"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>NIS</td>
                                        <td><?= $hasil["nis"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>NISN</td>
                                        <td><?= $hasil["nisn"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No Peserta</td>
                                        <td><?= $hasil["no_pes"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jurusan</td>
                                        <td>
                                            <?php if ($hasil["jurusan"] == 'A') { ?>
                                                IPA
                                            <?php } else { ?>
                                                IPS
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Nilai UNBK</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td>Mapel Pilihan</td>
                                        <td><?= $hasil["mapel_pil"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>B. Indonesia</td>
                                        <td><?= $hasil["bin"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>B. Inggris</td>
                                        <td><?= $hasil["bing"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Matematika</td>
                                        <td><?= $hasil["mat"]; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?= $hasil["mapel_pil"]; ?></td>
                                        <td><?= $hasil["pil"]; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3" align="center">
                        <div class="col-md">
                            <img src="<?= base_url('upload/siswa/' . $hasil["foto"]); ?>" width="180" class="img-thumbnail" />
                        </div>
                    </div>
                    <div class="row mb-3" align="center">
                        <div class="col-md">
                            <h3> Anda Dinyatakan </h3>
                            <?php if ($hasil["ket"] == 'L') { ?>
                                <span class="btn btn-success disabled font-weight-bold">Lulus</span>
                            <?php } else { ?>
                                <span class="btn btn-danger disabled font-weight-bold">Tidak Lulus</span>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row" align="center">
                        <div class="col-md">
                            <form action="<?= base_url('index/printskl/') . $hasil["no_pes"]; ?>" method="post">
                                <button type="submit" class="btn btn-md btn-success">
                                    <i class="fa fa-fw fa-print"></i> Cetak SKL
                                </button>
                            </form>
                            <?php if ($hasil["komite"] == '0') {  ?>
                                <button class="btn btn-md btn-success tombol-komite">
                                    <i class="fa fa-fw fa-print"></i> Cetak Nilai SKL
                                </button>
                            <?php } elseif ($hasil["pustaka"] == '0') { ?>
                                <button class="btn btn-md btn-success tombol-pustaka">
                                    <i class="fa fa-fw fa-print"></i> Cetak Nilai SKL
                                </button>
                            <?php } elseif ($hasil["pustaka"] == '0' && $hasil["komite"] == '0') { ?>
                                <button class="btn btn-md btn-success tombol-pustaka-komite">
                                    <i class="fa fa-fw fa-print"></i> Cetak Nilai SKL
                                </button>
                            <?php } elseif ($hasil["pustaka"] == '1' && $hasil["komite"] == '1') { ?>
                                <form class="mt-2" action="<?= base_url('index/printnilaiskl/') . $hasil["no_pes"]; ?>" method="post">
                                    <button type="submit" class="btn btn-md btn-success">
                                        <i class="fa fa-fw fa-print"></i> Cetak Nilai SKL
                                    </button>
                                </form>
                            <?php } else { ?>
                                <button class="btn btn-md btn-success tombol-pustaka-komite">
                                    <i class="fa fa-fw fa-print"></i> Cetak Nilai SKL
                                </button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
</div>