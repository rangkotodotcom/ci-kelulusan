<div class="container">
    <div class="alert" data-flashdata="<?= $this->session->flashdata('alert'); ?>"></div>

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-6 col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-2">Anda Lupa Password?</h1>
                            <p class="mb-4">Kami akan mengirim password baru anda. Silahkan masukan email anda yang terdaftar disistem kami.</p>
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/lupapassword'); ?>">
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Masukan Email Anda">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Reset Password
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth'); ?>">Kembali ke halaman login!</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>