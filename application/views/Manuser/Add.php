<div class="row justify-content-center">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="float-left" style="font-size: 11px;">peringatan:<br>tanda bintang (*) mengartikan wajib diisi</div>
                <h6 class="font-weight-bold text-primary text-right my-auto">Form tambah data</h6>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-12 col-md-9">
                        <form action="<?= site_url('Manuser/add'); ?>" method="POST">
                            <div class="form-group">
                                <label for="username">username <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="username" placeholder="nama panggilan*" value="<?= set_value('username'); ?>">
                                <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="password">password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" placeholder="sandi*">
                                <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="name">name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" placeholder="nama lengkap*" value="<?= set_value('name'); ?>">
                                <?php echo form_error('name', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="address">address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="address" placeholder="alamat*" value="<?= set_value('address'); ?>">
                                <?php echo form_error('address', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="phone">phone <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="phone" placeholder="nomor telpon*" value="<?= set_value('phone'); ?>">
                                <?php echo form_error('phone', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="level">level <span class="text-danger">*</span></label>
                                <select name="level_id" id="level_id" class="form-control">
                                    <option value="">-- pilih level --</option>
                                    <?php foreach ($level as $l) : ?>
                                        <option value="<?= $l->level_id; ?>"><?= $l->level; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary float-right btn-sm">
                                tambahkan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>