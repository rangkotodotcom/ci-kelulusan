<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="<?= base_url('master/informasi'); ?>">Informasi</a>
    </li>
    <li class="breadcrumb-item active">Detail</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-bullhorn"></i>
        Lihat Informasi</div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 font-weight-bold">
                    <?= $informasi->subjek ?>
                    <div class="small">
                        <?= tanggal_indo($informasi->tanggal_kirim) ?>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body"><?= $informasi->isi ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>