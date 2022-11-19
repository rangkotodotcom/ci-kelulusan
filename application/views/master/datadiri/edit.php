<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="<?= base_url('master/datadiri'); ?>">Data Siswa</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Form Edit Data Siswa</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <form action="<?= base_url('master/datadiri/edit/') . $datadiri->id ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $datadiri->id ?>">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="nama" id="nama" value="<?= $datadiri->nama ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="t_lahir" id="t_lahir" value="<?= $datadiri->t_lahir ?>">
                        <?= form_error('t_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control form-control-lg" name="tgl_lhr" id="tgl_lhr" value="<?= $datadiri->tgl_lhr ?>">
                        <?= form_error('tgl_lhr', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="n_ortu" id="n_ortu" value="<?= $datadiri->n_ortu ?>">
                        <?= form_error('n_ortu', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="nis" id="nis" value="<?= $datadiri->nis ?>">
                        <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="nisn" id="nisn" value="<?= $datadiri->nisn ?>">
                        <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="no_pes" id="no_pes" readonly value="<?= $datadiri->no_pes ?>">
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-lg" name="jurusan" id="jurusan">
                            <option value="">Jurusan</option>
                            <option value="A" <?php if ($datadiri->jurusan == 'A') {
                                                    echo "selected";
                                                }  ?>>IPA</option>
                            <option value="S" <?php if ($datadiri->jurusan == 'S') {
                                                    echo "selected";
                                                } ?>>IPS</option>
                        </select>
                        <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control-lg form-control-file" name="foto" id="foto">
                        <input type="hidden" id="old_foto" name="old_foto" value="<?= $datadiri->foto ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="tahun" name="tahun" value="<?= $datadiri->tahun ?>">
                    </div>

                    <button type="submit" name="edit" class="btn btn-primary">
                        Edit
                    </button>
                </form>
            </table>
        </div>
    </div>
</div>