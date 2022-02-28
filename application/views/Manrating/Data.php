<div class="card shadow mb-4">
  <div class="card-header py-auto">
    <h6 class="font-weight-bold text-primary my-auto">Management data rating user
      <div class="float-right my-auto">
        <a href="<?= site_url('Manrating/export'); ?>" type="button" class="btn btn-success btn-sm">
          <i class="fas fa-download"></i> unduh data
        </a>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#import_excel">
          <i class="fas fa-upload"></i> unggah data
        </button>
      </div>
    </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr class="text-center">
            <th width="1%">#</th>
            <th>kuliner</th>
            <th>user</th>
            <th>tempat</th>
            <th>pelayanan</th>
            <th>pemandangan</th>
            <th>kecepatan saji</th>
            <th>total</th>
            <th width="15%">aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($manrating as $m) : ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $m->name; ?></td>
              <td><?= $m->username; ?></td>
              <td><?= $m->nilai_tempat; ?></td>
              <td><?= $m->nilai_pelayanan; ?></td>
              <td><?= $m->nilai_pemandangan; ?></td>
              <td><?= $m->nilai_kecepatan_saji; ?></td>
              <td><?= $m->total_nilai; ?></td>
              <td class="text-center">
                <a href="<?= site_url('Manrating/edit/') . $m->id; ?>" type="button" class="btn btn-sm text-warning ml-3"><i class="fas fa-edit" style="color:dark;"></i> ubah</a>
                <a href="<?= site_url('Manrating/delete/') . $m->id; ?>" type="button" class="btn btn-sm text-danger ml-3"><i class="fas fa-trash" style="color:dark;"></i> hapus</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- modal import excel -->
<div class="modal fade" id="import_excel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">unggah file excel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('Manrating/import'); ?>
      <div class="modal-body">
        <div class="form-group">
          <label for="import">Pilih data excel</label>
          <input type="file" class="form-control-file" name="import" accept=".xlsx,.xls" id="import">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
        <button type="submit" class="btn btn-primary">upload</button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>