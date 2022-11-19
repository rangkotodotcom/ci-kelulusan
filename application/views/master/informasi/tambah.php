<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="<?= base_url('master/informasi'); ?>">Informasi</a>
    </li>
    <li class="breadcrumb-item active">Tambah</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Form Tambah Informasi</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <form action="<?= base_url('master/informasi/add'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="subjek" id="subjek" placeholder="Subjek" value="<?= set_value('subjek'); ?>">
                        <?= form_error('subjek', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-lg" name="tujuan" id="tujuan">
                            <option value="">Pilih Tujuan</option>
                            <option value="all">All</option>
                            <option value="public">Public</option>
                            <option value="admin">Admin</option>
                            <option value="pp">Pustaka</option>
                            <option value="tu">Tata Usaha</option>
                        </select>
                        <?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control form-control-lg" name="isi" id="isi" value="<?= set_value('isi'); ?>"></textarea>
                        <?= form_error('isi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <button type="submit" name="tambah" class="btn btn-primary">
                        Simpan
                    </button>
                </form>
            </table>
        </div>
    </div>
</div>