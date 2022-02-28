<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-auto">
                <h6 class="font-weight-bold text-primary my-auto">menerima kuliner baru ?</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table1" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th width="1%">#</th>
                                <th>foto</th>
                                <th>nama</th>
                                <th>alamat</th>
                                <th width="8%">wifi</th>
                                <th>link map</th>
                                <th width="17%">aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($mankuli_noaktif as $mn) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <img src="<?= base_url('assets/img/culinary/') . $mn->image; ?>" class="mx-auto d-block" style="width: 30px; height:30px; border-radius:50%;">
                                    </td>
                                    <td><?= $mn->name; ?></td>
                                    <td><?= $mn->address; ?></td>
                                    <td>
                                        <?php
                                        if ($mn->wifi_id == 0) {
                                            echo 'tidak ada';
                                        } else {
                                            echo 'ada';
                                        }
                                        ?>
                                    </td>
                                    <td><?= $mn->link; ?></td>
                                    <td class="text-center">
                                        <a href="<?= site_url('Mankuli/actived/') . $mn->culinary_id; ?>" type="button" class="btn btn-sm text-success ml-3"><i class="fas fa-check" style="color:dark;"></i> terima</a>
                                        <a href="<?= site_url('Mankuli/delete/') . $mn->culinary_id; ?>" type="button" class="btn btn-sm text-danger ml-3"><i class="fas fa-times" style="color:dark;"></i> tolak</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-auto">
                <h6 class="font-weight-bold text-primary my-auto">Management data kuliner
                    <div class="float-right my-auto">
                        <a class="btn btn-primary btn-sm" type="button" href="<?= site_url('Mankuli/add'); ?>">
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
                                <th>nama</th>
                                <th>alamat</th>
                                <th width="8%">wifi</th>
                                <th>link map</th>
                                <th width="17%">aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($mankuli_aktif as $ma) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <img src="<?= base_url('assets/img/culinary/') . $ma->image; ?>" class="mx-auto d-block" style="width: 30px; height:30px; border-radius:50%;">
                                    </td>
                                    <td><?= $ma->name; ?></td>
                                    <td><?= $ma->address; ?></td>
                                    <td>
                                        <?php
                                        if ($ma->wifi_id == 0) {
                                            echo 'tidak ada';
                                        } else {
                                            echo 'ada';
                                        }
                                        ?>
                                    </td>
                                    <td><?= $ma->link; ?></td>
                                    <td class=" text-center">
                                        <a href="<?= site_url('Mankuli/edit/') . $ma->culinary_id; ?>" type="button" class="btn btn-sm text-warning ml-3"><i class="fas fa-edit" style="color:dark;"></i> ubah</a>
                                        <a href="<?= site_url('Mankuli/delete/') . $ma->culinary_id; ?>" type="button" class="btn btn-sm text-danger ml-3"><i class="fas fa-trash" style="color:dark;"></i> hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>