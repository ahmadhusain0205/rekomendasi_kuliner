<div class="row justify-content-center">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="float-left" style="font-size: 11px;">peringatan:<br>tanda bintang (*) mengartikan wajib diisi</div>
                <h6 class="font-weight-bold text-primary text-right my-auto">Form tambah data</h6>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-12 col-md-9">
                        <form action="<?= site_url('Mankuli/add'); ?>" method="POST">
                            <div class="form-group">
                                <label for="name">name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" placeholder="nama kuliner*" value="<?= set_value('name'); ?>" autofocus>
                                <?php echo form_error('name', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="address">address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="address" placeholder="alamat*" value="<?= set_value('address'); ?>">
                                <?php echo form_error('address', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="wifi_id">status wifi <span class="text-danger">*</span></label>
                                <select name="wifi_id" class="form-control">
                                    <option value="">-- status wifi --</option>
                                    <option value="0">tidak ada</option>
                                    <option value="1">ada</option>
                                </select>
                                <?php echo form_error('wifi_id', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="link">link <span class="text-danger">*</span></label>
                                <input type="url" class="form-control" name="link" placeholder="link map*">
                                <?php echo form_error('link', '<small class="text-danger">', '</small>'); ?>
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