<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="<?= base_url('master/dataadmin'); ?>">Data Admin</a>
    </li>
    <li class="breadcrumb-item active">Detail</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-user"></i>
        Data Diri <?= $dataadmin->nama ?></div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td><?= $dataadmin->nama ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= $dataadmin->email ?></td>
                    </tr>
                    <tr>
                        <td>Level</td>
                        <td>
                            <?php if ($dataadmin->level == 'admin') {
                                echo "Admin";
                            } else if ($dataadmin->level == 'pp') {
                                echo "Pustaka";
                            } else {
                                echo "Tata Usaha";
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Status Akun</td>
                        <td>
                            <?php if ($dataadmin->is_active == '1') { ?>
                                <div class="badge badge-success">Aktif</div>
                            <?php } else { ?>
                                <div class="badge badge-danger">Non Aktif</div>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Login Terakhir</td>
                        <td><?= tanggal(date("j F Y", $dataadmin->last_login)) ?></td>
                    </tr>
                    <tr align="center">
                        <td colspan="3">
                            <img src="<?= base_url('upload/admin/' . $dataadmin->foto) ?>" width="150" class="img-thumbnail" />
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
</div>