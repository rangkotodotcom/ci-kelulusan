<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="<?= base_url('master/nilaiusbn'); ?>">Data USBN Siswa</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Form Edit Nilai USBN Siswa</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <form action="<?= base_url('master/nilaiusbn/edit/') . $nilaiusbn->id_us ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="no_pes" id="no_pes" value="<?= $nilaiusbn->no_pes ?>" readonly>
                        <?= form_error('no_pes', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>PAI</label>
                        <input type="text" class="form-control form-control-lg" name="pai" id="pai" value="<?= $nilaiusbn->pai ?>">
                        <?= form_error('pai', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>PPKN</label>
                        <input type="text" class="form-control form-control-lg" name="ppkn" id="ppkn" value="<?= $nilaiusbn->ppkn ?>">
                        <?= form_error('ppkn', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>IND</label>
                        <input type="text" class="form-control form-control-lg" name="ind" id="ind" value="<?= $nilaiusbn->ind ?>">
                        <?= form_error('ind', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>MTK</label>
                        <input type="text" class="form-control form-control-lg" name="mtk" id="mtk" value="<?= $nilaiusbn->mtk ?>">
                        <?= form_error('mtk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>SEJIND</label>
                        <input type="text" class="form-control form-control-lg" name="sejind" id="sejind" value="<?= $nilaiusbn->sejind ?>">
                        <?= form_error('sejind', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>ING</label>
                        <input type="text" class="form-control form-control-lg" name="ing" id="ing" value="<?= $nilaiusbn->ing ?>">
                        <?= form_error('ing', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>SENBUD</label>
                        <input type="text" class="form-control form-control-lg" name="senbud" id="senbud" value="<?= $nilaiusbn->senbud ?>">
                        <?= form_error('senbud', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>PJOK</label>
                        <input type="text" class="form-control form-control-lg" name="pjok" id="pjok" value="<?= $nilaiusbn->pjok ?>">
                        <?= form_error('pjok', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>PKWU</label>
                        <input type="text" class="form-control form-control-lg" name="pkwu" id="pkwu" value="<?= $nilaiusbn->pkwu ?>">
                        <?= form_error('pkwu', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>MAT / SEJ</label>
                        <input type="text" class="form-control form-control-lg" name="mat_sej" id="mat_sej" value="<?= $nilaiusbn->mat_sej ?>">
                        <?= form_error('mat_sej', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>FIS / EKO</label>
                        <input type="text" class="form-control form-control-lg" name="fis_eko" id="fis_eko" value="<?= $nilaiusbn->fis_eko ?>">
                        <?= form_error('fis_eko', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>KIM / SOS</label>
                        <input type="text" class="form-control form-control-lg" name="kim_sos" id="kim_sos" value="<?= $nilaiusbn->kim_sos ?>">
                        <?= form_error('kim_sos', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>BIO / GEO</label>
                        <input type="text" class="form-control form-control-lg" name="bio_geo" id="bio_geo" value="<?= $nilaiusbn->bio_geo ?>">
                        <?= form_error('bio_geo', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>LM</label>
                        <input type="text" class="form-control form-control-lg" name="lm" id="lm" value="<?= $nilaiusbn->lm ?>">
                        <?= form_error('lm', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control form-control-lg" name="tahun" id="tahun" value="<?= $nilaiusbn->tahun_us ?>">
                    </div>

                    <button type="submit" name="edit" class="btn btn-primary">
                        Edit
                    </button>
                </form>
            </table>
        </div>
    </div>
</div>