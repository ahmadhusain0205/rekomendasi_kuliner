<div class="row justify-content-center">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="float-left" style="font-size: 11px;">peringatan:<br>tanda bintang (*) mengartikan wajib diisi</div>
                <h6 class="font-weight-bold text-primary text-center my-auto">Form ubah sandi</h6>
                <a href="<?= site_url('Profile') ?>" class="btn btn-primary btn-sm float-right" style="margin-top: -25px;"><i class="fas fa-arrow-left"></i> kembali</a>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-12 col-md-9">
                        <?= form_open_multipart('Profile/password'); ?>
                        <div class="form-group">
                            <label for="password">sandi baru <span class="text-danger">*</span></label>
                            <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>">
                            <input type="password" class="form-control" name="password" placeholder="sandi baru*">
                            <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password2">ulangi sandi <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password2" placeholder="ulangi sandi*">
                            <?php echo form_error('password2', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary float-right btn-sm">
                            konfirmasi
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>