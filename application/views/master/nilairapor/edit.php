<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="<?= base_url('master/nilairapor'); ?>">Data Rapor Siswa</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Form Edit Nilai Rapor Siswa</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <form action="<?= base_url('master/nilairapor/edit/') . $nilairapor->no_pes ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="no_pes" id="no_pes" value="<?= $nilairapor->no_pes ?>" readonly>
                        <?= form_error('no_pes', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>PAI</label>
                        <input type="text" class="form-control form-control-lg" name="pai" id="pai" value="<?= $nilairapor->pai ?>">
                        <?= form_error('pai', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>PPKN</label>
                        <input type="text" class="form-control form-control-lg" name="ppkn" id="ppkn" value="<?= $nilairapor->ppkn ?>">
                        <?= form_error('ppkn', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>IND</label>
                        <input type="text" class="form-control form-control-lg" name="ind" id="ind" value="<?= $nilairapor->ind ?>">
                        <?= form_error('ind', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>MTK</label>
                        <input type="text" class="form-control form-control-lg" name="mtk" id="mtk" value="<?= $nilairapor->mtk ?>">
                        <?= form_error('mtk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>SEJIND</label>
                        <input type="text" class="form-control form-control-lg" name="sejind" id="sejind" value="<?= $nilairapor->sejind ?>">
                        <?= form_error('sejind', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>ING</label>
                        <input type="text" class="form-control form-control-lg" name="ing" id="ing" value="<?= $nilairapor->ing ?>">
                        <?= form_error('ing', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>SENBUD</label>
                        <input type="text" class="form-control form-control-lg" name="senbud" id="senbud" value="<?= $nilairapor->senbud ?>">
                        <?= form_error('senbud', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>PJOK</label>
                        <input type="text" class="form-control form-control-lg" name="pjok" id="pjok" value="<?= $nilairapor->pjok ?>">
                        <?= form_error('pjok', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>PKWU</label>
                        <input type="text" class="form-control form-control-lg" name="pkwu" id="pkwu" value="<?= $nilairapor->pkwu ?>">
                        <?= form_error('pkwu', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>MAT / SEJ</label>
                        <input type="text" class="form-control form-control-lg" name="mat_sej" id="mat_sej" value="<?= $nilairapor->mat_sej ?>">
                        <?= form_error('mat_sej', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>FIS / EKO</label>
                        <input type="text" class="form-control form-control-lg" name="fis_eko" id="fis_eko" value="<?= $nilairapor->fis_eko ?>">
                        <?= form_error('fis_eko', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>KIM / SOS</label>
                        <input type="text" class="form-control form-control-lg" name="kim_sos" id="kim_sos" value="<?= $nilairapor->kim_sos ?>">
                        <?= form_error('kim_sos', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>BIO / GEO</label>
                        <input type="text" class="form-control form-control-lg" name="bio_geo" id="bio_geo" value="<?= $nilairapor->bio_geo ?>">
                        <?= form_error('bio_geo', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>LM</label>
                        <input type="text" class="form-control form-control-lg" name="lm" id="lm" value="<?= $nilairapor->lm ?>">
                        <?= form_error('lm', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control form-control-lg" name="tahun" id="tahun" value="<?= $nilairapor->tahun ?>">
                    </div>

                    <button type="submit" name="edit" class="btn btn-primary">
                        Edit
                    </button>
                </form>
            </table>
        </div>
    </div>
</div>