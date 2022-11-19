<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card text-center bg-light mx-auto" style="max-width:30em; margin-top:100px; margin-bottom:10%;">
                <div class="card-header font-weight-bold">
                    ICT <?= strtoupper($profilsekolah["nama_sekolah"]) ?>
                </div>
                <div class="card-body" style="min-height:300px;">
                    <h5 class="card-title">Kontak Person</h5>
                    <table class="table table-hover table-striped">
                        <tbody>
                            <?php foreach ($kontak as $k) : ?>
                                <tr>
                                    <td><?= $k->nama  ?></td>
                                    <td><?= $k->no_hp ?></td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>