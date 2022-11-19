const alert = $('.alert').data('flashdata');

if (alert == "No Peserta Tidak Ditemukan") {
	Swal.fire({
		title: alert,
		text: 'Silahkan Periksa No Peserta Anda!',
		type: 'error'
	});

} else if (alert == "Tanggal Lahir Tidak Sesuai") {
	Swal.fire({
		title: alert,
		text: 'Masukan Tanggal Lahir Yang Benar!',
		type: 'error'
	});

} else if (alert == "NISN Tidak Ditemukan") {
	Swal.fire({
		title: 'Gagal',
		text: alert,
		type: 'error'
	});

} else if (alert == "Berhasil") {
	Swal.fire({
		title: alert,
		text: 'Silahkan Cek Email Anda!',
		type: 'success'
	});

} else if (alert == "lisensi") {
	const href = 'https://instagram.com';
	Swal.fire({
		title: 'Expired',
		type: 'warning'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});

} else {
	console.log(alert);
}

$('.tombol-pustaka').on('click', function () {
	Swal.fire({
		title: 'Maaf, Anda Belum Bisa Cetak SKL',
		text: "Silahkan Hubungi Petugas Perpustakaan Dahulu!",
		type: 'warning'
	})
});

$('.tombol-komite').on('click', function () {
	Swal.fire({
		title: 'Maaf, Anda Belum Bisa Cetak SKL',
		text: "Silahkan Hubungi Pegawai Tata Usaha Dahulu!",
		type: 'warning'
	})
});

$('.tombol-pustaka-komite').on('click', function () {
	Swal.fire({
		title: 'Maaf, Anda Belum Bisa Cetak SKL',
		text: "Silahkan Hubungi Pegawai Tata Usaha dan Perpustakaan Dahulu!",
		type: 'warning'
	})
});
