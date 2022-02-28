<div class="row justify-content-center">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="float-left" style="font-size: 11px;">peringatan:<br>tanda bintang (*) mengartikan wajib diisi</div>
                <h6 class="font-weight-bold text-primary text-center my-auto">Form ubah data</h6>
                <a href="<?= site_url('Profile') ?>" class="btn btn-primary btn-sm float-right" style="margin-top: -25px;"><i class="fas fa-arrow-left"></i> kembali</a>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-12 col-md-9">
                        <?= form_open_multipart('Profile/edit_process'); ?>
                        <div class="form-group">
                            <label for="image">foto <span class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9 my-auto">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">cari foto...</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username">username <span class="text-danger">*</span></label>
                            <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>">
                            <input type="text" class="form-control" name="username" placeholder="nama panggilan*" value="<?= $user['username']; ?>" readonly>
                            <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="name">nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="nama lengkap*" value="<?= $user['name']; ?>">
                            <?php echo form_error('name', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="address">alamat <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="address" placeholder="alamat*" value="<?= $user['address']; ?>">
                            <?php echo form_error('address', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="phone">nomor telpon <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="phone" placeholder="nomor telpon*" value="<?= $user['phone']; ?>">
                            <?php echo form_error('phone', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary float-right btn-sm">
                            simpan
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>