<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="<?= base_url('master/waktupengumuman'); ?>">Waktu Pengumuman</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-form"></i>
        Form Edit Waktu Pengumuman</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <form action="<?= base_url('master/waktupengumuman/edit/') . $system->id ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" class="form-control form-control-lg" name="id" id="id" value="<?= $system->id ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" value="<?= $system->waktu_pengumuman ?>" readonly>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control form-control-lg" name="tgl" id="tgl">
                        <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="time" class="form-control form-control-lg" name="jam" id="jam">
                        <?= form_error('jam', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <button type="submit" name="edit" class="btn btn-primary">
                        Edit
                    </button>
                </form>
            </table>
        </div>
    </div>
</div>