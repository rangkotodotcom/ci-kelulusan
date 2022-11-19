<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="<?= base_url('master/nilaiun'); ?>">Data UN Siswa</a>
    </li>
    <li class="breadcrumb-item active">Tambah</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Form Tambah Nilai UN Siswa</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <form action="<?= base_url('master/nilaiun/add'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <select class="js-example-basic-single form-control form-control-lg" name="nama" id="nama" onchange="namaSiswa()" value="<?= set_value('nama'); ?>">
                            <option value="">Pilih Siswa</option>

                            <?php foreach ($siswa as $s) : ?>

                                <option value="<?= $s->no_pes ?>/<?= $s->jurusan ?>"><?= $s->nama ?></option>

                            <?php endforeach; ?>
                        </select>
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="no_pes" id="no_pes" placeholder="No Peserta" value="<?= set_value('no_pes'); ?>" readonly>
                        <?= form_error('no_pes', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-lg" name="mapel_pil" id="mapel_pil" value="<?= set_value('mapel_pil'); ?>">
                            <option value="">Mapel Pilihan</option>
                            <option value="Biologi" id="A">Biologi</option>
                            <option value="Fisika" id="B">Fisika</option>
                            <option value="Kimia" id="C">Kimia</option>
                            <option value="Sosiologi" id="S">Sosiologi</option>
                            <option value="Geografi" id="R">Geografi</option>
                            <option value="Ekonomi" id="T">Ekonomi</option>
                        </select>
                        <?= form_error('mapel_pil', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="bin" id="bin" placeholder="B Indonesia" value="<?= set_value('bin'); ?>">
                        <?= form_error('bin', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="bing" id="bing" placeholder="B. Inggris" value="<?= set_value('bing'); ?>">
                        <?= form_error('bing', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="mat" id="mat" placeholder="Matematika" value="<?= set_value('mat'); ?>">
                        <?= form_error('mat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="pil" id="pil" placeholder="Pilihan" value="<?= set_value('pil'); ?>">
                        <?= form_error('pil', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-lg" name="ket" id="ket" value="<?= set_value('ket'); ?>">
                            <option value="">Keterangan</option>
                            <option value="L">Lulus</option>
                            <option value="TL">Tidak Lulus</option>
                        </select>
                        <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
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
        const pecah = nama.split("/");
        const no_pes = pecah[0];
        const jur = pecah[1];
        document.getElementById("no_pes").value = no_pes;


        if (jur == 'A') {

            document.getElementById("A").style.display = "block";
            document.getElementById("B").style.display = "block";
            document.getElementById("C").style.display = "block";
            document.getElementById("S").style.display = "none";
            document.getElementById("R").style.display = "none";
            document.getElementById("T").style.display = "none";

        } else {
            document.getElementById("A").style.display = "none";
            document.getElementById("B").style.display = "none";
            document.getElementById("C").style.display = "none";
            document.getElementById("S").style.display = "block";
            document.getElementById("R").style.display = "block";
            document.getElementById("T").style.display = "block";
        }
    }
</script>