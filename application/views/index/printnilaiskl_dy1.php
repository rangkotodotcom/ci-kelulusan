<?php

if ($skl['jurusan'] == 'A') {
    $program = 'MATEMATIKAN DAN ILMU PENGETAHUAN ALAM';
    $pem1 = 'Matematika';
    $pem2 = 'Fisika';
    $pem3 = 'Kimia';
    $pem4 = 'Biologi';
} else {
    $program = 'ILMU PENGETAHUAN SOSIAL';
    $pem1 = 'Sejarah';
    $pem2 = 'Ekonomi';
    $pem3 = 'Sosiologi';
    $pem4 = 'Geografi';
}

$bin = $skl['bin'];
$bing = $skl['bing'];
$mat = $skl['mat'];
$pil = $skl['pil'];
$ket = $skl['ket'];
$mapel_pil = $skl['mapel_pil'];

$total_un = $bin + $bing + $mat + $pil;
$rata_rata_un = $total_un / 4;


$pai_r = $skl['pai_rapor'];
$ppkn_r = $skl['ppkn_rapor'];
$ind_r = $skl['ind_rapor'];
$mtk_r = $skl['mtk_rapor'];
$sejind_r = $skl['sejind_rapor'];
$ing_r = $skl['ing_rapor'];
$senbud_r = $skl['senbud_rapor'];
$pjok_r = $skl['pjok_rapor'];
$pkwu_r = $skl['pkwu_rapor'];
$mat_sej_r = $skl['mat_sej_rapor'];
$fis_eko_r = $skl['fis_eko_rapor'];
$kim_sos_r = $skl['kim_sos_rapor'];
$bio_geo_r = $skl['bio_geo_rapor'];
$lm_r = $skl['lm_rapor'];

$total_r = $pai_r + $ppkn_r + $ind_r + $mtk_r + $sejind_r + $ing_r + $senbud_r + $pjok_r + $pkwu_r + $mat_sej_r + $fis_eko_r + $kim_sos_r + $bio_geo_r + $lm_r;

$rata_rata_r = round(($total_r / 14));

$pai_us = $skl['pai_us'];
$ppkn_us = $skl['ppkn_us'];
$ind_us = $skl['ind_us'];
$mtk_us = $skl['mtk_us'];
$sejind_us = $skl['sejind_us'];
$ing_us = $skl['ing_us'];
$senbud_us = $skl['senbud_us'];
$pjok_us = $skl['pjok_us'];
$pkwu_us = $skl['pkwu_us'];
$mat_sej_us = $skl['mat_sej_us'];
$fis_eko_us = $skl['fis_eko_us'];
$kim_sos_us = $skl['kim_sos_us'];
$bio_geo_us = $skl['bio_geo_us'];
$lm_us = $skl['lm_us'];

$total_us = $pai_us + $ppkn_us + $ind_us + $mtk_us + $sejind_us + $ing_us + $senbud_us + $pjok_us + $pkwu_us + $mat_sej_us + $fis_eko_us + $kim_sos_us + $bio_geo_us + $lm_us;

$rata_rata_us = round(($total_us / 14));

?>
<!DOCTYPE html>
<html>

<head>
    <title>Surat Keterangan Capaian Kompetensi</title>
</head>

<body>
    <div class="header">
        <center>
            <table style="text-align:center; width:100%;">
                <tr>
                    <td style="font-size:15px;">
                        DAFTAR NILAI<br>
                        <?= $profilsekolah['nama_sekolah'];  ?><br>
                        PROGRAM <?= $program ?><br>
                        TAHUN PELAJARAN <?= $profilsekolah['tahun_ajaran'];  ?><br>
                    </td>
                </tr>
            </table><br>
            <table width="90%" style="font-size:13px;">
                <tr>
                    <td>Nama</td>
                    <td> : </td>
                    <td><b><?= $skl['nama']; ?></b></td>
                </tr>
                <tr>
                    <td>Tempat dan Tanggal Lahir</td>
                    <td> : </td>
                    <td><?= $skl['t_lahir']; ?>, <?= tanggal(date("j F Y", strtotime($skl['tgl_lhr']))); ?></td>
                </tr>
                <tr>
                    <td>NIS / NISN</td>
                    <td> : </td>
                    <td><?= $skl['nis']; ?> / <?= $skl['nisn']; ?></td>
                </tr>
                <tr>
                    <td>Mata Ujian Pilihan</td>
                    <td> : </td>
                    <td><?= $program ?></td>
                </tr>
            </table>
        </center>

    </div><br>

    <div class="content">
        <p align="justify" style="margin:0; font-size:14px;">A. Capaian Rata-Rata Nilai Rapor dan Nilai Ujian sekolah (USBN-BK & KP) Sebagai Berikut :</p>

        <table width="100%" cellspacing="0" cellpadding="1" border="1" style="text-align:center; border:2px solid;">
            <tr style="background-color:#d3d3d3">
                <th rowspan="2" style="text-align: center; line-height: 50px;">No</th>
                <th rowspan="2" style="text-align: center; line-height: 50px;">Mata Pelajaran</th>
                <th colspan="2" style="text-align: center;">Nilai</th>
            </tr>
            <tr style="background-color:#d3d3d3">
                <th rowspan="2" style="text-align: center;">Rata-Rata Rapor</th>
                <th rowspan="2" style="text-align: center;">USBN BK/KP</th>
            </tr>
            <tr style="background-color:#d3d3d3">
                <td colspan="2" style="font-weight:bold;" align="left">Kelompok A (Umum)</td>
            </tr>
            <tr>
                <td>1</td>
                <td align="left">Pendidikan Agama dan Budi Pekerti</td>
                <td><?= $pai_r ?></td>
                <td><?= $pai_us ?></td>
            </tr>
            <tr>
                <td>2</td>
                <td align="left">Pendidikan Pancasila dan Kewarganegaraan</td>
                <td><?= $ppkn_r ?></td>
                <td><?= $ppkn_us ?></td>
            </tr>
            <tr>
                <td>3</td>
                <td align="left">Bahasa Indonesia</td>
                <td><?= $ind_r ?></td>
                <td><?= $ind_us ?></td>
            </tr>
            <tr>
                <td>4</td>
                <td align="left">Matematika</td>
                <td><?= $mtk_r ?></td>
                <td><?= $mtk_us ?></td>
            </tr>
            <tr>
                <td>5</td>
                <td align="left">Sejarah Indonesia</td>
                <td><?= $sejind_r ?></td>
                <td><?= $sejind_us ?></td>
            </tr>
            <tr>
                <td>6</td>
                <td align="left">Bahasa Inggris</td>
                <td><?= $ing_r ?></td>
                <td><?= $ing_us ?></td>
            </tr>
            <tr style="background-color:#d3d3d3">
                <td colspan="2" style="font-weight:bold;" align="left">Kelompok B (Umum)</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>1</td>
                <td align="left">Seni Budaya</td>
                <td><?= $senbud_r ?></td>
                <td><?= $senbud_us ?></td>
            </tr>
            <tr>
                <td>2</td>
                <td align="left">Pendidikan Jasmani, Olahraga dan Kesehatan</td>
                <td><?= $pjok_r ?></td>
                <td><?= $pjok_us ?></td>
            </tr>
            <tr>
                <td>3</td>
                <td align="left">Prakarya dan Kewirausahaan</td>
                <td><?= $pkwu_r ?></td>
                <td><?= $pkwu_us ?></td>
            </tr>
            <tr style="background-color:#d3d3d3">
                <td colspan="2" style="font-weight:bold;" align="left">Kelompok C (Peminatan)</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>1</td>
                <td align="left"><?= $pem1 ?></td>
                <td><?= $mat_sej_r ?></td>
                <td><?= $mat_sej_us ?></td>
            </tr>
            <tr>
                <td>2</td>
                <td align="left"><?= $pem2 ?></td>
                <td><?= $fis_eko_r ?></td>
                <td><?= $fis_eko_us ?></td>
            </tr>
            <tr>
                <td>3</td>
                <td align="left"><?= $pem3 ?></td>
                <td><?= $kim_sos_r ?></td>
                <td><?= $kim_sos_us ?></td>
            </tr>
            <tr>
                <td>4</td>
                <td align="left"><?= $pem4 ?></td>
                <td><?= $bio_geo_r ?></td>
                <td><?= $bio_geo_us ?></td>
            </tr>
            <tr>
                <td>5</td>
                <td align="left">Lintas Minat</td>
                <td><?= $lm_r ?></td>
                <td><?= $lm_us ?></td>
            </tr>
            <tr style="background-color:#d3d3d3; font-weight:bold;">
                <td colspan="2" style="font-weight:bold;">RATA - RATA</td>
                <td><?= $rata_rata_r ?></td>
                <td><?= $rata_rata_us ?></td>
            </tr>
        </table><br>

        <p align="justify" style="margin:0">B. Capaian Hasil Ujian Nasional Berbasis Komputer (UNBK) Sebagai Berikut :</p>

        <table width="100%" cellspacing="0" cellpadding="1" border="1" style="text-align:center; border:2px solid;">
            <tr style="background-color:#d3d3d3">
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Mata Pelajaran</th>
                <th style="text-align: center;">Nilai UNBK</th>
                <th style="text-align: center;">Jumlah</th>
            </tr>
            <tr>
                <td>1</td>
                <td align="left">Bahasa Indonesia</td>
                <td><?= $bin ?></td>
                <td rowspan="4" style="line-height:50px;"><?= $total_un ?></td>
            </tr>
            <tr>
                <td>2</td>
                <td align="left">Bahasa Inggris</td>
                <td><?= $bing ?></td>
            </tr>
            <tr>
                <td>3</td>
                <td align="left">Matematika</td>
                <td><?= $mat ?></td>
            </tr>
            <tr>
                <td>4</td>
                <td align="left"><?= $mapel_pil ?></td>
                <td><?= $pil ?></td>
            </tr>
        </table>

    </div><br>

    <div class="footer">
        <table style="text-align:center; width:100%; ">
            <tr>
                <td align="left" style="padding-left:350px;">
                    <p><?= $blangkosurat['tempat_surat'] ?>, <?= tanggal(date("j F Y", strtotime($blangkosurat['tanggal_surat']))) ?><br>Kepala Sekolah,</p><br><br><br>
                    <p><b><u><?= $profilsekolah['kepsek'];  ?></u></b><br>NIP. <?= $profilsekolah['nip_kepsek'];  ?></p>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>