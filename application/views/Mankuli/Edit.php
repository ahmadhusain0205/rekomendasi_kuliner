<div class="row justify-content-center">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="float-left" style="font-size: 11px;">peringatan:<br>tanda bintang (*) mengartikan wajib diisi</div>
                <h6 class="font-weight-bold text-primary text-center my-auto">Form ubah data</h6>
                <a href="<?= site_url('Mankuli') ?>" class="btn btn-primary btn-sm float-right" style="margin-top: -25px;"><i class="fas fa-arrow-left"></i> kembali</a>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-12 col-md-9">
                        <?= form_open_multipart('Mankuli/edit_process'); ?>
                        <?php foreach ($mankuli as $m) : ?>
                            <div class="form-group">
                                <label for="image">foto <span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/img/culinary/') . $m->image; ?>" class="img-thumbnail">
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
                                <label for="name">nama <span class="text-danger">*</span></label>
                                <input type="hidden" name="culinary_id" value="<?= $m->culinary_id; ?>">
                                <input type="text" class="form-control" name="name" placeholder="nama kuliner*" value="<?= $m->name; ?>">
                                <?php echo form_error('name', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="address">alamat <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="address" placeholder="alamat*" value="<?= $m->address; ?>">
                                <?php echo form_error('address', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="wifi">status wifi <span class="text-danger">*</span></label>
                                <select name="wifi_id" class="form-control">
                                    <option value="<?= $m->wifi_id; ?>">
                                        <?php if ($m->wifi_id == 0) {
                                            echo 'tidak ada';
                                        } else {
                                            echo 'ada';
                                        } ?>
                                    </option>
                                    <option value="0">tidak ada</option>
                                    <option value="1">ada</option>
                                </select>
                                <?php echo form_error('wifi_id', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="link">link map <span class="text-danger">*</span></label>
                                <input type="url" class="form-control" name="link" placeholder="link map*" value="<?= $m->link; ?>">
                                <?php echo form_error('link', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <button type="submit" class="btn btn-primary float-right btn-sm">
                                simpan
                            </button>
                        <?php endforeach; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>