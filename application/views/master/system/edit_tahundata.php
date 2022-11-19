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
        Form Edit Tahun Data Aktif</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <form action="<?= base_url('master/tahundata/edit/') . $system->id ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" class="form-control form-control-lg" name="id" id="id" value="<?= $system->id ?>">
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-lg" name="tahun" id="tahun">
                            <?php
                            $$awal_th = '2019';
                            for ($tahun = $$awal_th; $tahun <= date('Y'); $tahun++) {
                                // Skrip tahun terpilih
                                if ($tahun == $system->tahun_data) {
                                    $cek = " selected";
                                } else {
                                    $cek = "";
                                }

                                echo "<option value='$tahun' $cek> $tahun </option>";
                            }
                            ?>
                        </select>
                        <?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <button type="submit" name="edit" class="btn btn-primary">
                        Edit
                    </button>
                </form>
            </table>
        </div>
    </div>
</div>