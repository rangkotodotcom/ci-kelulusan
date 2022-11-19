<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="<?= base_url('master/datadiri'); ?>">Data Siswa</a>
    </li>
    <li class="breadcrumb-item active">Tambah</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Form Tambah Data Siswa</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <form action="<?= base_url('master/datadiri/add'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="nama" id="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="t_lahir" id="t_lahir" placeholder="Tempat Lahir" value="<?= set_value('t_lahir'); ?>">
                        <?= form_error('t_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control form-control-lg" name="tgl_lhr" id="tgl_lhr" placeholder="Tanggal Lahir" value="<?= set_value('tgl_lhr'); ?>">
                        <?= form_error('tgl_lhr', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="n_ortu" id="n_ortu" placeholder="Nama Orang Tua" value="<?= set_value('n_ortu'); ?>">
                        <?= form_error('n_ortu', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="nis" id="nis" placeholder="NIS" value="<?= set_value('nis'); ?>">
                        <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="nisn" id="nisn" placeholder="NISN" value="<?= set_value('nisn'); ?>">
                        <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="no_pes" id="no_pes" placeholder="No Peserta" value="<?= set_value('no_pes'); ?>">
                        <?= form_error('no_pes', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-lg" name="jurusan" id="jurusan" value="<?= set_value('jurusan'); ?>">
                            <option value="">Jurusan</option>
                            <option value="A">IPA</option>
                            <option value="S">IPS</option>
                        </select>
                        <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control-lg form-control-file" name="foto" id="foto">
                        <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <button type="submit" name="tambah" class="btn btn-primary">
                        Simpan
                    </button>
                </form>
            </table>
        </div>
    </div>
</div>