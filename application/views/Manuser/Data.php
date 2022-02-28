<div class="card shadow mb-4">
    <div class="card-header py-auto">
        <h6 class="font-weight-bold text-primary my-auto">Management data user
            <div class="float-right my-auto">
                <a class="btn btn-primary btn-sm" type="button" href="<?= site_url('Manuser/add'); ?>">
                    <i class="fas fa-plus"></i> tambah data
                </a>
            </div>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th width="1%">#</th>
                        <th>foto</th>
                        <th>panggilan</th>
                        <th>asli</th>
                        <th>alamat</th>
                        <th>nomor telpon</th>
                        <th>level</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($manuser as $m) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <?php
                                if ($m->on_off == 1) {
                                    echo '
                                    <img src="';
                                    echo base_url("assets/img/profile/") . $m->image;
                                    echo '" class="mx-auto d-block" style="width: 30px; height:30px; border-radius:50%; border: 3px solid #0000ff;">
                                    ';
                                } else {
                                    echo '
                                    <img src="';
                                    echo base_url("assets/img/profile/") . $m->image;
                                    echo '" class="mx-auto d-block" style="width: 30px; height:30px; border-radius:50%; border: 3px solid red;">
                                    ';
                                }
                                ?>
                            </td>
                            <td><?= $m->username; ?></td>
                            <td><?= $m->name; ?></td>
                            <td><?= $m->address; ?></td>
                            <td><?= $m->phone; ?></td>
                            <td>
                                <?php
                                if ($m->level_id == 1) {
                                    echo 'administrator';
                                } else {
                                    echo 'member';
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                if ($m->on_off == 1) {
                                    echo '<a type="button" class="btn btn-sm text-dark ml-3"><i class="fas fa-ban" style="color:grey;"></i> disable</a>';
                                } else {
                                    if ($m->level_id == 2) {
                                        echo '<a href="';
                                        echo site_url('Manuser/lvup/') . $m->user_id;
                                        echo '" type="button" class="btn btn-sm text-secondary ml-3"><i class="fas fa-level-down-alt" style="color:grey;"></i> level upgrade</a>';
                                    } else {
                                        echo '<a href="';
                                        echo site_url('Manuser/lvdown/') . $m->user_id;
                                        echo '" type="button" class="btn btn-sm text-success ml-3"><i class="fas fa-level-up-alt" style="color:dark;"></i> level downgrade</a>';
                                    }
                                ?>
                                    <a href="<?= site_url('Manuser/edit/') . $m->user_id; ?>" type="button" class="btn btn-sm text-warning ml-3"><i class="fas fa-edit" style="color:dark;"></i> ubah</a>
                                    <a href="<?= site_url('Manuser/delete/') . $m->user_id; ?>" type="button" class="btn btn-sm text-danger ml-3"><i class="fas fa-trash" style="color:dark;"></i> hapus</a>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>