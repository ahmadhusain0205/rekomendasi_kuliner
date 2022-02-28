<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">jumlah kuliner yang terdaftar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kulter; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-mortar-pestle fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">jumlah kuliner baru diajukan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kulaju; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cloud-meatball fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">jumlah member</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $pengguna; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">kuliner terpopuler</div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800"><?= $place['name']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fire fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card shadow mb-4">
            <div class="card-header text-center bg-primary">
                <div class="h4 text-white my-auto">Selamat datang <?= $user['name']; ?></div>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <p><img src="<?= base_url('assets/img/bismillah.jpg'); ?>" width="100"></p>
                    <p style="padding: 1rem;">
                        Atas Berkat Rahmat <b class="text-primary">الله</b> yang Maha Pengasih lagi Maha Penyayang. Developer telah menyelesaikan Sistem Rekomendasi Kuliner yang berada di Kota Magelang. Sistem ini menawarkan rekomendasi tempat kuliner kepada para penggunanya, untuk memberikan masukan jika mana kostumer bingung memilih tempat untuk makan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>