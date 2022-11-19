<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ganti Password</h1>
</div>

<div class="row">
    <div class="col-lg-6">
        <form action="<?= base_url('setting/gantipassword/') ?>" method="post">

            <div class="form-group row">
                <label for="pass_lam" class="col-sm-2 col-form-label">Password Lama</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="pass_lam" id="pass_lam">
                    <?= form_error('pass_lam', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="pass_baru1" class="col-sm-2 col-form-label">Password Baru</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="pass_baru1" id="pass_baru1">
                    <?= form_error('pass_baru1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="pass_baru2" class="col-sm-2 col-form-label">Ulangi Password Baru</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="pass_baru2" id="pass_baru2">
                    <?= form_error('pass_baru2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" name="ganti" class="btn btn-primary">Ganti</button>
                </div>
            </div>

        </form>
    </div>
</div>