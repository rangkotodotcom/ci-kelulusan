<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="<?= base_url('master/tahundata'); ?>">Tahun Data</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-form"></i>
        Form Edit Akses Halaman Utama</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <form action="<?= base_url('master/tahundata/edit_akses/') . $system->id ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" class="form-control form-control-lg" name="id" id="id" value="<?= $system->id ?>">
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-lg" name="akses" id="akses">
                            <option value="">Akses</option>
                            <option value="buka" <?php if ($system->akses == 'buka') {
                                                        echo "selected";
                                                    }  ?>>Dibuka</option>
                            <option value="tutup" <?php if ($system->akses == 'tutup') {
                                                        echo "selected";
                                                    } ?>>Ditutup</option>
                        </select>
                        <?= form_error('akses', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <button type="submit" name="edit" class="btn btn-primary">
                        Edit
                    </button>
                </form>
            </table>
        </div>
    </div>
</div>