<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


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
    <link href="<?= base_url('assets/') ?>css/select2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>css/timeline/timeline.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>vendor/timeline/dist/css/timeline.min.css" rel="stylesheet" />
    <link rel="icon" href="<?= base_url('assets/') ?>img/icon.png" type="image/png">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="sidebar-brand-text mx-3">
                    <?php if ($this->session->userdata('level') == 'admin') { ?>
                        ADMIN
                    <?php } else if ($this->session->userdata('level') == 'pp') { ?>
                        PUSTAKA
                    <?php } else { ?>
                        TATAUSAHA
                    <?php } ?>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if ($this->uri->segment(1) == "admin") {
                                    echo "active";
                                } ?>">
                <a class="nav-link" href="<?= base_url('admin/') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php if ($this->session->userdata('level') == 'admin') { ?>

                <!-- Heading -->
                <div class="sidebar-heading">
                    Master
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item <?php if ($this->uri->segment(2) == "profilsekolah" or $this->uri->segment(2) == "blangkosurat" or $this->uri->segment(2) == "isisurat") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesekolah" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-home"></i>
                        <span>Data Sekolah</span>
                    </a>
                    <div id="collapsesekolah" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Data Sekolah:</h6>
                            <a class="collapse-item <?php if ($this->uri->segment(2) == "profilsekolah") {
                                                        echo "active";
                                                    } ?>" href="<?= base_url('master/profilsekolah/') ?>">Profil Sekolah</a>
                            <a class="collapse-item <?php if ($this->uri->segment(2) == "blangkosurat") {
                                                        echo "active";
                                                    } ?>" href="<?= base_url('master/blangkosurat/') ?>">Blangko Surat</a>
                            <!-- <a class="collapse-item <?php if ($this->uri->segment(2) == "isisurat") {
                                                                echo "active";
                                                            } ?>" href="<?= base_url('master/isisurat/') ?>">Isi Surat</a> -->
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item <?php if ($this->uri->segment(2) == "datadiri" or $this->uri->segment(2) == "nilaiun" or $this->uri->segment(2) == "isisurat" or $this->uri->segment(2) == "nilairapor" or $this->uri->segment(2) == "admsiswa") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Data Siswa</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Data Siswa:</h6>
                            <a class="collapse-item <?php if ($this->uri->segment(2) == "datadiri") {
                                                        echo "active";
                                                    } ?>" href="<?= base_url('master/datadiri/') ?>">Data Diri</a>
                            <a class="collapse-item <?php if ($this->uri->segment(2) == "nilaiun") {
                                                        echo "active";
                                                    } ?>" href="<?= base_url('master/nilaiun/') ?>">Nilai UN</a>
                            <a class="collapse-item <?php if ($this->uri->segment(2) == "nilaiusbn") {
                                                        echo "active";
                                                    } ?>" href="<?= base_url('master/nilaiusbn/') ?>">Nilai USBN</a>
                            <a class="collapse-item <?php if ($this->uri->segment(2) == "nilairapor") {
                                                        echo "active";
                                                    } ?>" href="<?= base_url('master/nilairapor/') ?>">Nilai Rapor</a>
                            <a class="collapse-item <?php if ($this->uri->segment(2) == "admsiswa") {
                                                        echo "active";
                                                    } ?>" href="<?= base_url('master/admsiswa/') ?>">Adm Siswa</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - History -->
                <li class="nav-item <?php if ($this->uri->segment(2) == "informasi") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="<?= base_url('master/informasi/') ?>">
                        <i class="fas fa-fw fa-bullhorn"></i>
                        <span>Informasi</span></a>
                </li>

                <!-- Nav Item - History -->
                <li class="nav-item <?php if ($this->uri->segment(2) == "izindownload") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="<?= base_url('master/izindownload/') ?>">
                        <i class="fas fa-fw fa-user-lock"></i>
                        <span>Akses Donwload</span></a>
                </li>

                <li class="nav-item <?php if ($this->uri->segment(2) == "importsiswa" or $this->uri->segment(2) == "importnilaiun" or $this->uri->segment(2) == "importnilaius" or $this->uri->segment(2) == "importnilairapor") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseImport" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-file-import"></i>
                        <span>Import</span>
                    </a>
                    <div id="collapseImport" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Import Data:</h6>
                            <a class="collapse-item <?php if ($this->uri->segment(2) == "importsiswa") {
                                                        echo "active";
                                                    } ?>" href="<?= base_url('master/importsiswa/') ?>">Import Siswa</a>
                            <a class="collapse-item <?php if ($this->uri->segment(2) == "importnilaiun") {
                                                        echo "active";
                                                    } ?>" href="<?= base_url('master/importnilaiun/') ?>">Import Nilai UN</a>
                            <a class="collapse-item <?php if ($this->uri->segment(2) == "importnilaius") {
                                                        echo "active";
                                                    } ?>" href="<?= base_url('master/importnilaius/') ?>">Import Nilai USBN</a>
                            <a class="collapse-item <?php if ($this->uri->segment(2) == "importnilairapor") {
                                                        echo "active";
                                                    } ?>" href="<?= base_url('master/importnilairapor/') ?>">Import Nilai Rapor</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Nav Item - Utilities Collapse Menu -->
                <?php if ($this->session->userdata('nama') == 'Jamilur Rusydi Al Miichtari') {  ?>

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Mechine
                    </div>
                    <li class="nav-item <?php if ($this->uri->segment(2) == "dataadmin" or $this->uri->segment(2) == "waktupengumuman" or $this->uri->segment(2) == "tahundata") {
                                            echo "show";
                                        } ?>">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSistem" aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-fw fa-cogs"></i>
                            <span>Sistem</span>
                        </a>
                        <div id="collapseSistem" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Pengaturan Sistem:</h6>
                                <a class="collapse-item <?php if ($this->uri->segment(2) == "dataadmin") {
                                                            echo "active";
                                                        } ?>" href="<?= base_url('master/dataadmin/') ?>">Data Admin</a>
                                <a class="collapse-item <?php if ($this->uri->segment(2) == "waktupengumuman") {
                                                            echo "active";
                                                        } ?>" href="<?= base_url('master/waktupengumuman/') ?>">Waktu Pengumuman</a>
                                <a class="collapse-item <?php if ($this->uri->segment(2) == "tahundata") {
                                                            echo "active";
                                                        } ?>" href="<?= base_url('master/tahundata/') ?>">Tahun Data</a>
                            </div>
                        </div>
                    </li>

                    <!-- Nav Item - History -->
                    <li class="nav-item <?php if ($this->uri->segment(2) == "cp") {
                                            echo "active";
                                        } ?>">
                        <a class="nav-link" href="<?= base_url('master/cp/') ?>">
                            <i class="fas fa-fw fa-phone"></i>
                            <span>Contact Person</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">
                <?php } ?>



            <?php } else if ($this->session->userdata('level') == 'pp') { ?>

                <!-- Nav Item - History -->
                <li class="nav-item <?php if ($this->uri->segment(2) == "pustaka") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="<?= base_url('page/pustaka/') ?>">
                        <i class="fas fa-fw fa-user-alt"></i>
                        <span>Data Siswa</span></a>
                </li>

            <?php } else { ?>

                <!-- Nav Item - History -->
                <li class="nav-item <?php if ($this->uri->segment(2) == "tatausaha") {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="<?= base_url('page/tatausaha/') ?>">
                        <i class="fas fa-fw fa-user-alt"></i>
                        <span>Data Siswa</span></a>
                </li>

            <?php } ?>



            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b><?= $user['nama']; ?></b></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('upload/admin/' . $user['foto']) ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('setting/profil/') ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="<?= base_url('setting/logaktifitas/') ?>">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Log Aktifitas
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">