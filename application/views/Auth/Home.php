<div class="row">
  <div class="col">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="row mx-auto">
          <div class="col-md text-primary my-auto">
            <b>Daftar Kuliner Kota Magelang</b>
          </div>
          <div class="col-md my-auto">
            <form action="<?= site_url('Auth/keadaan') ?>" method="POST">
              <div class="input-group">
                <select name="keadaan" class="form-control">
                  <option value="total_nilai">-- rating tertinggi --</option>
                  <option value="nilai_tempat">-- nilai tempat --</option>
                  <option value="nilai_pelayanan">-- nilai pelayanan --</option>
                  <option value="nilai_pemandangan">-- nilai pemandangan --</option>
                  <option value="nilai_kecepatan_saji">-- nilai kecepatan saji --</option>
                </select>
                <div class="input-group-append">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="row justify-content-center">
      <?php foreach ($culinary as $c) : ?>
        <div class="col-lg-3 mb-4">
          <div class="card h-100 shadow">
            <div class="card-header bg-primary">
              <?php
              $ratingx = $this->db->query('select sum(total_nilai) as total from rating where culinary_id = ' . $c->culinary_id)->result();
              $xuser = $this->db->query('select count(user_id) as xuser from rating where culinary_id = ' . $c->culinary_id)->result();
              foreach ($ratingx as $q) {
                $xrating = $q->total;
              }
              foreach ($xuser as $xu) {
                $duser = $xu->xuser;
              }
              $avg = number_format($xrating / $duser, 1);
              ?>
              <i class="fa fa-star text-warning"> <?= $avg; ?></i>
              <button type="button" class="btn btn-outline-light float-right btn-sm mw-100" data-toggle="modal" data-target="#review<?= $c->culinary_id; ?>">
                ulasan
              </button>
            </div>
            <div class="card-body text-center">
              <img src="<?= base_url('assets/img/culinary/') . $c->image; ?>" style="object-fit: cover; width: 200px; height:200px;" class="rounded">
            </div>
            <div class="h5 text-primary text-center ml-2 mr-2"><?= $c->name; ?></div>
            <br>
            <div class="card-footer text-center bg-primary">
              <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail<?= $c->culinary_id; ?>">
                <i class="fas fa-info-circle"></i> detail
              </button>
              <a href="<?= $c->link; ?>" type="button" class="btn btn-success btn-sm">
                <i class="fas fa-road"></i> pergi
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- modal detail -->
<?php foreach ($culinary as $c) : ?>
  <div class="modal fade" id="detail<?= $c->culinary_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-warning" id="exampleModalLabel"><b>detail kuliner</b></h5>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label for="name" class="col-sm-4 col-form-label">nama kuliner</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="name" value="<?= $c->name; ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="address" class="col-sm-4 col-form-label">alamat kuliner</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="address" value="<?= $c->address; ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="wifi_id" class="col-sm-4 col-form-label">status wifi</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="wifi_id" value="<?php if ($c->wifi_id == 0) {
                                                                              echo 'tidak ada';
                                                                            } else {
                                                                              echo 'ada';
                                                                            } ?>" readonly>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php endforeach; ?>


<!-- modal review -->
<?php foreach ($culinary as $c) : ?>
  <div class="modal fade" id="review<?= $c->culinary_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-secondary" id="exampleModalLabel"><b>ulasan kuliner <?= $c->name; ?></b></h5>
        </div>
        <div class="modal-body">
          <?php
          $culinary_review = $this->db->query('SELECT a.culinary_id, a.name, a.address, a.wifi_id, a.link, a.image, b.username, b.image as foto, c.nilai_tempat, c.nilai_pelayanan, c.nilai_pemandangan, c.nilai_kecepatan_saji, c.total_nilai FROM culinary a join rating c on a.culinary_id=c.culinary_id join user b on c.user_id=b.user_id WHERE a.is_actived = 1 and c.total_nilai is not null and a.culinary_id = ' . $c->culinary_id)->result();
          ?>
          <?php foreach ($culinary_review as $cr) : ?>
            <div class="row">
              <div class="col-sm-4">
                <div class="card h-90 shadow mb-4 bg-primary" style="height: 150px;">
                  <div class="card-body text-center">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <img src="<?= base_url('assets/img/profile/') . $cr->foto; ?>" style="width: 70px; height:70px; border-radius:50%; border: 1px solid #ffff;">
                          </div>
                        </div>
                        <div class="row mt-2">
                          <div class="col text-center text-white h4"><?= $cr->username; ?></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-8 my-auto">
                <div class="card h-90 shadow mb-4 border-primary" style="height: 150px;">
                  <div class="card-body">
                    <b class="text-danger">memberi nilai : <?= $cr->total_nilai; ?></b>
                    <br>
                    ------------------------------------
                    nilai tempat : <?= $cr->nilai_tempat ?>, nilai pelayanan : <?= $cr->nilai_pelayanan ?>, nilai pemandangan : <?= $cr->nilai_pemandangan ?>, nilai kecepatan saji : <?= $cr->nilai_kecepatan_saji ?>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>