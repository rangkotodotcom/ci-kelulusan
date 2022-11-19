<?php

if ($skl['ket'] == 'L') {
    $ket = "LULUS";
} else {
    $ket = "TIDAK LULUS";
}

if ($profilsekolah['daerah'] == "Kab") {
    $dati_kop = "KABUPATEN";
    $dati_pem = "Kabupaten";
    $dati = "Kabupaten/<s>Kota</s>";
} else {
    $dati_kop = "KOTA";
    $dati_pem = "Kota";
    $dati = "<s>Kabupaten/</s>Kota";
}

$pecah = explode(" ", $profilsekolah['nama_sekolah']);
$enam = ucwords(strtolower($pecah['3']));
$lingkung = ucwords(strtolower($pecah['4']));

?>

<!DOCTYPE html>
<html>

<head>
    <title>Surat Keterangan Lulus</title>
</head>

<body>
    <div class="header">
        <center>
            <table style="text-align:center; width:100%; border-bottom:3px solid;">
                <tr>
                    <td align="center">
                        <img src="<?= base_url('upload/logo/' . $profilsekolah['logo_prov']) ?>" width="70" />
                    </td>
                    <td style="font-size:16px;">
                        PEMERINTAH PROVINSI <?= strtoupper($profilsekolah['prov']);  ?><br>
                        <span style="font-size:14px;">DINAS PENDIDIKAN</span><br>
                        <span style="font-size:18x;"><?= $profilsekolah['nama_sekolah'];  ?></span><br>
                        <?= $dati_kop ?> <?= strtoupper($profilsekolah['kab_kota']);  ?><br>
                    </td>
                    <td align="center">
                        <img src="<?= base_url('upload/logo/' . $profilsekolah['logo_sekolah']) ?>" width="80" />
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="3" style="font-size:10px;">Alamat : <?= $profilsekolah['alamat'];  ?> Telp : <?= $profilsekolah['telp'];  ?> E-mail : <?= $profilsekolah['email'];  ?> Website : <?= $profilsekolah['website'];  ?> Kode Pos : <?= $profilsekolah['kode_pos'];  ?> </td>
                </tr>
            </table>


        </center>

    </div><br>

    <div class="content">
        <h3 align="center"><u><b><?= $blangkosurat['nama_surat'] ?></b></u><br><span style="font-size:12px;">NOMOR : <?= $blangkosurat['nomor_surat'] ?></span></h3>
        <p style="font-size:14px;">Yang bertanda tangan dibawah ini, Kepala Sekolah Menengah Atas Negeri 1 2x11 <?= $enam ?> <?= $lingkung ?> <?= $dati_pem ?> <?= $profilsekolah['kab_kota']; ?> dengan ini menerangkan :</p>
        <table style="font-size:14px;" cellpadding="1">
            <tr>
                <td>Nomor Pokok Sekolah Nasional</td>
                <td> : </td>
                <td><?= $profilsekolah['npsn'];  ?></td>
            </tr>
            <tr>
                <td><?= $dati ?></td>
                <td> : </td>
                <td><?= $profilsekolah['kab_kota'];  ?></td>
            </tr>
            <tr>
                <td>Provinsi</td>
                <td> : </td>
                <td><?= $profilsekolah['prov'];  ?></td>
            </tr>
            <tr>
                <td> </td>
            </tr>
            <tr>
                <td> </td>
            </tr>
            <tr>
                <td colspan="3">Menerangkan Bahwa</td>
            </tr>
            <tr>
                <td> </td>
            </tr>
            <tr>
                <td> </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td> : </td>
                <td><?= $skl['nama']; ?></td>
            </tr>
            <tr>
                <td>Tempat dan Tanggal Lahir</td>
                <td> : </td>
                <td><?= $skl['t_lahir']; ?>, <?= tanggal(date("j F Y", strtotime($skl['tgl_lhr']))); ?></td>
            </tr>
            <tr>
                <td>Nama Orang Tua/Wali</td>
                <td> : </td>
                <td><?= $skl['n_ortu']; ?></td>
            </tr>
            <tr>
                <td>Nomor Induk Siswa</td>
                <td> : </td>
                <td><?= $skl['nis']; ?></td>
            </tr>
            <tr>
                <td>Nomor Induk Siswa Nasional</td>
                <td> : </td>
                <td><?= $skl['nisn']; ?></td>
            </tr>
            <tr>
                <td>Nomor Peserta Ujian</td>
                <td> : </td>
                <td><?= $skl['no_pes']; ?></td>
            </tr>
            <tr>
                <td>Sekolah Penyelenggara Ujian Sekolah</td>
                <td> : </td>
                <td>SMAN 1 2x11 <?= $enam ?> <?= $lingkung ?></td>
            </tr>
            <tr>
                <td> </td>
            </tr>

        </table>

        <p style="font-size:13px;" align="justify">Berdasarkan hasil keputusan Rapat Dewan Guru tanggal <?= tanggal(date("j F Y", strtotime($blangkosurat['tanggal_surat']))) ?>, nama yang tersebut diatas dinyatakan :</p>
        <p align="center" style="font-size:25px;"><?= $ket ?></b></p>
        <p style="font-size:13px;" align="justify">dari Sekolah Menengah Atas setelah memenuhi seluruh kriteria sesuai dengan peraturan perundang-undangan.<br><br>
            Surat Keterangan ini berlaku sampai keluarnya ijazah/STTB di terbitkan.<br><br>
            Demikian Surat Keterangan ini diberikan agar di pergunakan sebagaimana mestinya.</p><br><br><br>
    </div>

    <div class="footer">
        <table style="text-align:center; width:100%; ">
            <tr>
                <td align="left">
                    <img src="<?= base_url('upload/qrcode/' . $skl["qrcode"]); ?>" width="90" />
                </td>
                <td align="right" style="padding-left:120px;">
                    <img src="<?= base_url('upload/siswa/' . $skl["foto"]); ?>" width="100" />
                </td>
                <td align="left" style="padding-left:40px;">
                    <p><?= $blangkosurat['tempat_surat'] ?>, <?= tanggal(date("j F Y", strtotime($blangkosurat['tanggal_surat']))) ?><br>Kepala Sekolah,</p><br><br><br>
                    <p><b><u><?= $profilsekolah['kepsek'];  ?></u></b><br>NIP. <?= $profilsekolah['nip_kepsek'];  ?></p>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>