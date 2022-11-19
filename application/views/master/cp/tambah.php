<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="<?= base_url('master/cp'); ?>">Data Contact Person</a>
    </li>
    <li class="breadcrumb-item active">Tambah</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Form Tambah Contact Person</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <form action="<?= base_url('master/cp/add'); ?>" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="nama" id="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="no_hp" id="no_hp" placeholder="No Handphone" value="<?= set_value('no_hp'); ?>">
                        <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <button type="submit" name="tambah" class="btn btn-primary">
                        Simpan
                    </button>
                </form>
            </table>
        </div>
    </div>
</div>