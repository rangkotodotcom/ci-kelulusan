<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="<?= base_url('master/blangkosurat'); ?>">Blangko Surat</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Form Edit Blangko Surat</div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg">
                <form action="<?= base_url('master/blangkosurat/edit/') . $blangkosurat->id ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $blangkosurat->id ?>">
                    <div class="form-group row">
                        <label for="nama_surat" class="col-sm-2 col-form-label">Nama Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_surat" value="<?= $blangkosurat->nama_surat ?>" id="nama_surat">
                            <?= form_error('nama_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nomor_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nomor_surat" value="<?= $blangkosurat->nomor_surat ?>" id="nomor_surat">
                            <?= form_error('nomor_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat_surat" class="col-sm-2 col-form-label">Tempat Surat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="tempat_surat" value="<?= $blangkosurat->tempat_surat ?>" id="tempat_surat">
                            <?= form_error('tempat_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_surat" class="col-sm-2 col-form-label">Tanggal Surat</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tanggal_surat" value="<?= $blangkosurat->tanggal_surat ?>" id="tanggal_surat">
                            <?= form_error('tanggal_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="p_us" class="col-sm-2 col-form-label">Sekolah Penyelenggara US</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="p_us" value="<?= $blangkosurat->p_us ?>" id="p_us">
                            <?= form_error('p_us', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="p_un" class="col-sm-2 col-form-label">Sekolah Penyelenggara UN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="p_un" value="<?= $blangkosurat->p_un ?>" id="p_un">
                            <?= form_error('p_un', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <button type="submit" name="edit" class="btn btn-primary">
                        Edit
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>