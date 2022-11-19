<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="<?= base_url('master/nilaiun'); ?>">Data UN Siswa</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Form Edit Nilai UN Siswa</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <form action="<?= base_url('master/nilaiun/edit/') . $nilaiun->no_pes ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="no_pes" id="no_pes" value="<?= $nilaiun->no_pes ?>" readonly>
                        <?= form_error('no_pes', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-lg" name="mapel_pil" id="mapel_pil">
                            <option value="">Mapel Pilihan</option>
                            <?php if ($nilaiun->mapel_pil == 'Biologi' or $nilaiun->mapel_pil == 'Fisika' or $nilaiun->mapel_pil == 'Kimia') { ?>
                                <option value="Biologi" <?php if ($nilaiun->mapel_pil == 'Biologi') {
                                                            echo "selected";
                                                        }  ?>>Biologi</option>
                                <option value="Fisika" <?php if ($nilaiun->mapel_pil == 'Fisika') {
                                                            echo "selected";
                                                        } ?>>Fisika</option>
                                <option value="Kimia" <?php if ($nilaiun->mapel_pil == 'Kimia') {
                                                            echo "selected";
                                                        } ?>>Kimia</option>
                            <?php } else { ?>
                                <option value="Sosiologi" <?php if ($nilaiun->mapel_pil == 'Sosiologi') {
                                                                echo "selected";
                                                            } ?>>Sosiologi</option>
                                <option value="Geografi" <?php if ($nilaiun->mapel_pil == 'Geografi') {
                                                                echo "selected";
                                                            } ?>>Geografi</option>
                                <option value="Ekonomi" <?php if ($nilaiun->mapel_pil == 'Ekonomi') {
                                                            echo "selected";
                                                        } ?>>Ekonomi</option>
                            <?php } ?>
                        </select>
                        <?= form_error('mapel_pil', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="bin" id="bin" value="<?= $nilaiun->bin ?>">
                        <?= form_error('bin', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="bing" id="bing" value="<?= $nilaiun->bing ?>">
                        <?= form_error('bing', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="mat" id="mat" value="<?= $nilaiun->mat ?>">
                        <?= form_error('mat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="pil" id="pil" value="<?= $nilaiun->pil ?>">
                        <?= form_error('pil', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-lg" name="ket" id="ket">
                            <option value="">Keterangan</option>
                            <option value="L" <?php if ($nilaiun->ket == 'L') {
                                                    echo "selected";
                                                }  ?>>Lulus</option>
                            <option value="TL" <?php if ($nilaiun->ket == 'TL') {
                                                    echo "selected";
                                                } ?>>Tidak Lulus</option>
                        </select>
                        <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control form-control-lg" name="tahun" id="tahun" value="<?= $nilaiun->tahun ?>">
                    </div>

                    <button type="submit" name="edit" class="btn btn-primary">
                        Edit
                    </button>
                </form>
            </table>
        </div>
    </div>
</div>