<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="<?= base_url('admin/'); ?>">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="<?= base_url('master/dataadmin'); ?>">Data Admin</a>
    </li>
    <li class="breadcrumb-item active">Edit</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Form Edit Admin</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <form action="<?= base_url('master/dataadmin/edit/') . $dataadmin->id ?>" method="post">
                    <input type="hidden" name="id" value="<?= $dataadmin->id ?>">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="nama" id="nama" value="<?= $dataadmin->nama ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="email" id="email" value="<?= $dataadmin->email ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <select class="form-control form-control-lg" name="level" id="level">
                            <option value="">Level</option>
                            <option value="admin" <?php if ($dataadmin->level == 'admin') {
                                                        echo "selected";
                                                    } ?>>Admin</option>
                            <option value="pp" <?php if ($dataadmin->level == 'pp') {
                                                    echo "selected";
                                                } ?>>Pustaka</option>
                            <option value="tu" <?php if ($dataadmin->level == 'tu') {
                                                    echo "selected";
                                                } ?>>Tata Usaha</option>
                        </select>
                        <?= form_error('level', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <button type="submit" name="edit" class="btn btn-primary">
                        Edit
                    </button>
                </form>
            </table>
        </div>
    </div>
</div>