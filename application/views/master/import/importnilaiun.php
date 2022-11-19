<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Import Nilai UN Siswa</h1>
</div>

<div class="row">
    <div class="col-lg-6">
        <a href="<?= base_url('master/importnilaiun/downloadformat') ?>" class="btn btn-primary mb-3">
            <i class="fa fa-fw fa-download"></i> Download Format
        </a>
        <form action="<?= base_url('master/importnilaiun/upload') ?>" method="post" enctype="multipart/form-data">

            <div class="form-group row">
                <div class="col-sm-2">File</div>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="userfile" name="userfile" required>
                        <label class="custom-file-label" for="userfile">Choose file</label>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>

        </form>
    </div>
</div>