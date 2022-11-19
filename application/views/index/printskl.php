<?php

if ($skl['ket'] == 'L') {
    $ket = "LULUS";
} else {
    $ket = "TIDAK LULUS";
}

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
                        <img src="<?= base_url('assets/img/prov.png') ?>" width="70" />
                    </td>
                    <td style="font-size:16px;">
                        PEMERINTAH PROVINSI SUMATERA BARAT<br>
                        <span style="font-size:14px;">DINAS PENDIDIKAN</span><br>
                        <span style="font-size:18x;">SMAN 1 2x11 ENAM LINGKUNG</span><br>
                        KABUPATEN PADANG PARIAMAN<br>
                    </td>
                    <td align="center">
                        <img src="<?= base_url('assets/img/logo.png') ?>" width="80" />
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="3" style="font-size:10px;">Alamat : jl. Bari Sicincin Telp : 0751-675129 E-mail : smansa2x11el@gmail.com Website : sman12x11el.sch.id Kode Pos : 25584 </td>
                </tr>
            </table>


        </center>

    </div><br>

    <div class="content">
        <h3 align="center"><u><b>SURAT KETERANGAN LULUS</b></u><br><span style="font-size:12px;">NOMOR : 421/478/SMAN.1-2x11 EL/2020</span></h3>
        <p style="font-size:14px;">Yang bertanda tangan dibawah ini, Kepala Sekolah Menengah Atas Negeri 1 2x11 Enam Lingkung Kabupaten Padang Pariaman dengan ini menerangkan :</p>
        <table style="font-size:14px;" cellpadding="1">
            <tr>
                <td>Nomor Pokok Sekolah Nasional</td>
                <td> : </td>
                <td>10305549</td>
            </tr>
            <tr>
                <td>Kabupaten/<s>Kota</s></td>
                <td> : </td>
                <td>Padang Pariaman</td>
            </tr>
            <tr>
                <td>Provinsi</td>
                <td> : </td>
                <td>Sumatera Barat</td>
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
                <td>SMAN 1 2x11 Enam Lingkung</td>
            </tr>
            <tr>
                <td>Sekolah Penyelenggara Ujian Nasional</td>
                <td> : </td>
                <td>SMAN 1 2x11 Enam Lingkung</td>
            </tr>
            <tr>
                <td> </td>
            </tr>

        </table>

        <p style="font-size:13px;" align="justify">Berdasarkan hasil keputusan Rapat Dewan Guru tanggal 13 Mei 2020, nama yang tersebut diatas dinyatakan ;</p>
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
                <td align="right" style="padding-left:100px;">
                    <img src="<?= base_url('upload/siswa/' . $skl["foto"]); ?>" width="100" />
                </td>
                <td align="left" style="padding-left:40px;">
                    <p>Sicincin, 13 Mei 2020<br>Kepala Sekolah,</p><br><br><br>
                    <p><b><u>SRI ASTUTI, S.Pd, MM</u></b><br>NIP. 19620414 198703 2 008</p>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>