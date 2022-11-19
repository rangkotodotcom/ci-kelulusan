<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/countdown/dscountdown.css" media="all">
    <link rel="icon" href="<?= base_url('assets/') ?>img/icon.png" type="image/png">
    <script data-ad-client="ca-pub-2069234867558631" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

</head>

<body class="bg-gradient-img">

    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="<?= base_url() ?>"><?= strtoupper($profilsekolah["nama_sekolah"]) ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php if ($this->uri->segment(1) == "") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="<?= base_url() ?>">Home</span></a>
                </li>
                <li class="nav-item <?php if ($this->uri->segment(2) == "pengumuman") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="<?= base_url('public/pengumuman/') ?>">Pengumuman</a>
                </li>
                <!-- <li class="nav-item <?php if ($this->uri->segment(2) == "grafik") {
                                                echo "active";
                                            } ?>">
                    <a class="nav-link" href="<?= base_url('public/grafik/') ?>">Grafik Nilai</a>
                </li> -->
                <li class="nav-item <?php if ($this->uri->segment(2) == "kontak") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="<?= base_url('public/kontak/') ?>">Kontak</a>
                </li>
            </ul>

            <a href="<?= base_url('auth/') ?>" class="btn btn-outline-success">Login Admin</a>
        </div>
    </nav>