const alert = $('.alert').data('flashdata');

if (alert == "Registrasi Akun Berhasil") {
	Swal.fire({
		title: alert,
		text: 'Silahkan aktivasi akun melalui Email sebelum Login!',
		type: 'success'
	});

} else if (alert == "Login Gagal") {
	Swal.fire({
		title: alert,
		text: 'Email anda tidak terdaftar',
		type: 'error'
	});

} else if (alert == "Email Belum Aktif") {
	Swal.fire({
		title: alert,
		text: 'Silahkan aktivasi email dahulu',
		type: 'error'
	});

} else if (alert == "Password Salah") {
	Swal.fire({
		title: alert,
		text: 'Masukan password dengan benar',
		type: 'error'
	});

} else if (alert == "Logout Berhasil") {
	Swal.fire({
		title: alert,
		text: '',
		type: 'success'
	});

} else {
	console.log(alert);

}
