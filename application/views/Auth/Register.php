<div class="row justify-content-center mt-5">
    <div class="col-lg-5">
        <div class="text-center text-white">
            <img src="<?= base_url('assets/'); ?>img/logo.png" width="50">
            <!-- <i class="fab fa-wolf-pack-battalion"></i> -->
        </div>
        <div class="card shadow-lg my-5">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg">
                        <div class="p-3">
                            <div class="text-center">
                                <h1 class="h4 text-primary mb-4 text-uppercase font-weight-bold">Rekomendasi Kuliner</h1>
                            </div>
                            <?= $this->session->flashdata('message'); ?>
                            <hr>
                            <form action="<?= site_url('Auth/regis'); ?>" method="POST">
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="width: 50px;"><i class="fa fa-user"></i></div>
                                        </div>
                                        <input type="text" class="form-control" name="username" placeholder="nama panggilan*" value="<?= set_value('username'); ?>">
                                    </div>
                                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="width: 50px;"><i class="fa fa-lock"></i></div>
                                        </div>
                                        <input type="password" class="form-control" name="password" placeholder="sandi*" value="<?= set_value('password'); ?>">
                                    </div>
                                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="width: 50px;"><i class="fa fa-file-signature"></i></div>
                                        </div>
                                        <input type="text" class="form-control" name="name" placeholder="nama lengkap*" value="<?= set_value('name'); ?>">
                                    </div>
                                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="width: 50px;"><i class="fa fa-map-marker-alt"></i></div>
                                        </div>
                                        <input type="text" class="form-control" name="address" placeholder="alamat*" value="<?= set_value('address'); ?>">
                                    </div>
                                    <?= form_error('address', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="width: 50px;"><i class="fa fa-phone"></i></div>
                                        </div>
                                        <input type="number" class="form-control" name="phone" placeholder="nomor telpon*" value="<?= set_value('phone'); ?>">
                                    </div>
                                    <?= form_error('phone', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">
                                    daftar
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small float-left" href="<?= site_url('Auth'); ?>">kembali ke beranda!</a>
                                <a class="small float-right" href="<?= site_url('Auth/login'); ?>">sudah punya akun!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>