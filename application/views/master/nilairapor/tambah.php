<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="<?= base_url('master/nilairapor'); ?>">Data Rapor Siswa</a>
    </li>
    <li class="breadcrumb-item active">Tambah</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Form Tambah Nilai Rapor Siswa</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <form action="<?= base_url('master/nilairapor/add'); ?>" method="post">
                    <div class="form-group">
                        <select class="js-example-basic-single form-control form-control-lg" name="nama" id="nama" onchange="namaSiswa()">
                            <option value="">Pilih Siswa</option>

                            <?php foreach ($siswa as $s) : ?>

                                <option value="<?= $s->no_pes ?>"><?= $s->nama ?></option>

                            <?php endforeach; ?>

                        </select>
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="no_pes" id="no_pes" placeholder="No Peserta" value="<?= set_value('no_pes'); ?>" readonly>
                        <?= form_error('no_pes', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="pai" id="pai" placeholder="PAI" value="<?= set_value('pai'); ?>">
                        <?= form_error('pai', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="ppkn" id="ppkn" placeholder="PPKN" value="<?= set_value('ppkn'); ?>">
                        <?= form_error('ppkn', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="ind" id="ind" placeholder="IND" value="<?= set_value('ind'); ?>">
                        <?= form_error('ind', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="mtk" id="mtk" placeholder="MTK" value="<?= set_value('mtk'); ?>">
                        <?= form_error('mtk', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="sejind" id="sejind" placeholder="SEJIND" value="<?= set_value('sejind'); ?>">
                        <?= form_error('sejind', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="ing" id="ing" placeholder="ING" value="<?= set_value('ing'); ?>">
                        <?= form_error('ing', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="senbud" id="senbud" placeholder="SENBUD" value="<?= set_value('senbud'); ?>">
                        <?= form_error('senbud', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="pjok" id="pjok" placeholder="PJOK" value="<?= set_value('pjok'); ?>">
                        <?= form_error('pjok', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="pkwu" id="pkwu" placeholder="PKWU" value="<?= set_value('pkwu'); ?>">
                        <?= form_error('pkwu', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="mat_sej" id="mat_sej" placeholder="MAT / SEJ" value="<?= set_value('mat_sej'); ?>">
                        <?= form_error('mat_sej', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="fis_eko" id="fis_eko" placeholder="FIS / EKO" value="<?= set_value('fis_eko'); ?>">
                        <?= form_error('fis_eko', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="kim_sos" id="kim_sos" placeholder="KIM /SOS" value="<?= set_value('kim_sos'); ?>">
                        <?= form_error('kim_sos', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="bio_geo" id="bio_geo" placeholder="BIO / GEO" value="<?= set_value('bio_geo'); ?>">
                        <?= form_error('bio_geo', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="lm" id="lm" placeholder="LM" value="<?= set_value('lm'); ?>">
                        <?= form_error('lm', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <button type="submit" name="tambah" class="btn btn-primary">
                        Simpan
                    </button>
                </form>
            </table>
        </div>
    </div>
</div>

<script>
    function namaSiswa() {
        const nama = document.getElementById("nama").value;
        document.getElementById("no_pes").value = nama;
    }
</script>