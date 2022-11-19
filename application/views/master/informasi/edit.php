<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="<?= base_url('master/informasi'); ?>">Informasi</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Form Edit Informasi</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <form action="<?= base_url('master/informasi/edit/') . $informasi->id ?>" method="post">
                    <input type="hidden" name="id" value="<?= $informasi->id ?>">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="subjek" id="subjek" value="<?= $informasi->subjek ?>">
                        <?= form_error('subjek', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-lg" name="tujuan" id="tujuan">
                            <option value="">Tujuan</option>
                            <option value="all" <?php if ($informasi->tujuan == 'all') {
                                                    echo "selected";
                                                }  ?>>All</option>
                            <option value="public" <?php if ($informasi->tujuan == 'public') {
                                                        echo "selected";
                                                    } ?>>Public</option>
                            <option value="pp" <?php if ($informasi->tujuan == 'pp') {
                                                    echo "selected";
                                                } ?>>Pustaka</option>
                            <option value="tu" <?php if ($informasi->tujuan == 'tu') {
                                                    echo "selected";
                                                } ?>>Tata Usaha</option>
                        </select>
                        <?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control form-control-lg" name="isi" id="isi"><?= $informasi->isi ?></textarea>
                        <?= form_error('isi', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control form-control-lg" name="tahun_info" id="tahun" value="<?= $informasi->tahun_info ?>">
                    </div>

                    <button type="submit" name="edit" class="btn btn-primary">
                        Edit
                    </button>
                </form>
            </table>
        </div>
    </div>
</div>