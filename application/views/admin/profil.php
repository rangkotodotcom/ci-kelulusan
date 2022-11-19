<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profil</h1>
</div>

<div class="row">
    <div class="card border-info mb-3" style="max-width: 500px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('upload/admin/' . $user['foto']) ?>" class="card-img" alt="Image">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['email']  ?></h5>
                    <p class="card-text"><?= $user['nama']  ?></p>
                    <p class="card-text">
                        <small class="text-muted">
                            Last login <?= tanggal(date("j F Y", $user['last_login'])) ?>
                        </small>
                    </p>
                </div>
                <div class="card-footer">
                    <a href="<?= base_url('setting/editprofil/') ?>" class="btn btn-success btn-sm">Edit Profil</a>
                    <a href="<?= base_url('setting/gantipassword/') ?>" class="btn btn-primary btn-sm">Ganti Password</a>
                </div>
            </div>
        </div>
    </div>
</div>