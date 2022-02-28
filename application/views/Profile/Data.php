<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-auto">
                <h6 class="font-weight-bold text-primary my-auto">Profil saya
                    <div class="float-right">
                        <a href="<?= site_url('Profile/edit'); ?>" type="button" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i> ubah profile
                        </a>
                    </div>
                </h6>
            </div>
            <div class="card-body">
                <div class="row ml-auto mb-4">
                    <div class="col-md-4 my-auto">
                        <div class="text-center">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail" style="object-fit: cover; width: 300px; height:300px;">
                            <br><br>
                            <a type="button" class="img-thumbnail bg-primary text-white text-center" style="width: 200px;"><?= $user['name']; ?></a>
                        </div>
                    </div>
                    <div class="col-md-8 my-auto">
                        <form>
                            <div class="form-group">
                                <label for="username">nama panggilan</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="phone">nomor telpon</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?= $user['phone']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="address">alamat</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?= $user['address']; ?>" readonly>
                            </div>
                            <a class="float-right">Terdaftar pada: <b class="text-primary"><?= $user['created']; ?></b></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>