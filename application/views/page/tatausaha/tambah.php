<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="<?= base_url('page/tatausaha'); ?>">Bebas Tata Usaha</a>
    </li>
    <li class="breadcrumb-item active">Tambah</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Form Tambah Bebas Tata Usaha</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <form action="<?= base_url('page/tatausaha/add'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <select class="js-example-basic-single form-control form-control-lg" name="nama" id="nama" onchange="namaSiswa()" value="<?= set_value('nama'); ?>">
                            <option value="">Pilih Siswa</option>

                            <?php foreach ($siswa as $s) : ?>

                                <option value="<?= $s->no_pes ?>"><?= $s->nama ?></option>

                            <?php endforeach; ?>
                        </select>
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="no_pes" id="no_pes" placeholder="No Peserta" value="<?= set_value('no_pes'); ?>" readonly>
                        <?= form_error('no_pes', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <button type="submit" name="tambah" class="btn btn-primary">
                        Simpan
                    </button>
                </form>
            </table>
        </div>
    </div>
</div>

<script>
    function namaSiswa() {
        const nama = document.getElementById("nama").value;
        document.getElementById("no_pes").value = nama;
    }
</script>