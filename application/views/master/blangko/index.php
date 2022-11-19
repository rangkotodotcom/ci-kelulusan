<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Blangko Surat</li>
</ol>

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-9 col-lg-8">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header">
                <i class="fas fa-envelope"></i>
                Blangko Surat</div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>Nama Surat</td>
                                <td><?= $blangkosurat->nama_surat ?></td>
                            </tr>
                            <tr>
                                <td>Nomor Surat</td>
                                <td><?= $blangkosurat->nomor_surat ?></td>
                            </tr>
                            <tr>
                                <td>Tempat dan Tanggal Surat</td>
                                <td><?= $blangkosurat->tempat_surat ?>, <?= tanggal(date("j F Y", strtotime($blangkosurat->tanggal_surat))) ?></td>
                            </tr>
                            <tr>
                                <td>Sekolah Penyelenggara US</td>
                                <td><?= $blangkosurat->p_us ?></td>
                            </tr>
                            <tr>
                                <td>Sekolah Penyelenggara UN</td>
                                <td><?= $blangkosurat->p_un ?></td>
                            </tr>
                            <tr>
                                <td>Update Terakhir</td>
                                <td><?= tanggal_indo($blangkosurat->last_update) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary btn-md" href="<?= base_url('master/blangkosurat/edit/') . $blangkosurat->id; ?>">Edit</a>
            </div>
        </div>
    </div>
</div>