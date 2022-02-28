<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description">
    <meta name="author">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Kuliner</title>
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!--<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">-->
    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?= base_url('assets/img/'); ?>logo.png">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="
                <?php if ($user['level_id'] == 1) {
                    echo site_url('Admin');
                } else {
                    echo site_url('Member');
                } ?>
            "><img src="<?= base_url('assets/'); ?>img/logo.png" width="30"> Kuliner Magelang
            </a>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
            <div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <?php
                    if ($user['level_id'] == 1) {
                    ?>
                        <?php if ($this->uri->segment(1) == 'Manrating') {
                            echo '<li class="nav-item active">';
                        } else {
                            echo '<li class="nav-item">';
                        } ?>
                        <a class="nav-link" href="<?= site_url('Manrating'); ?>"><i class="fa fa-star"></i> Management rating</a>
                        </li>
                        <?php if ($this->uri->segment(1) == 'Manuser') {
                            echo '<li class="nav-item active">';
                        } else {
                            echo '<li class="nav-item">';
                        } ?>
                        <a class="nav-link" href="<?= site_url('Manuser'); ?>"><i class="fa fa-users"></i> Management user</a>
                        </li>
                        <?php if ($this->uri->segment(1) == 'Mankuli') {
                            echo '<li class="nav-item active">';
                        } else {
                            echo '<li class="nav-item">';
                        } ?>
                        <a class="nav-link" href="<?= site_url('Mankuli'); ?>"><i class="fa fa-mortar-pestle"></i> Management Kuliner
                            <?php
                            $kulaju = $this->db->get_where('culinary', 'is_actived = 0')->num_rows();
                            if ($kulaju != 0) {
                                echo '<sup class="text-warning">baru +' . $kulaju . '</sup>';
                            } ?>
                        </a>
                        </li>
                    <?php } else { ?>
                        <?php if ($this->uri->segment(1) == 'Recomendation') {
                            echo '<li class="nav-item active">';
                        } else {
                            echo '<li class="nav-item">';
                        }
                        ?>
                        <a class="nav-link" href="<?= site_url('Recomendation'); ?>"><i class="fa fa-award"></i> Rekomendasi</a>
                        </li>
                        <?php if ($this->uri->segment(1) == 'Culinary') {
                            echo '<li class="nav-item active">';
                        } else {
                            echo '<li class="nav-item">';
                        }
                        ?>
                        <a class="nav-link" href="<?= site_url('Culinary'); ?>"><i class="fa fa-home"></i> Kuliner</a>
                        </li>
                    <?php } ?>
                    <?php if ($this->uri->segment(1) == 'Profile') { ?>
                        <li class="nav-item dropdown active">
                        <?php } else {
                        ?>
                        <li class="nav-item dropdown">
                        <?php } ?>
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" width="30" style="border-radius: 50%;"> <?= $user['name']; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?= site_url('Profile'); ?>"><i class="fa fa-id-card-alt"></i> profil</a>
                            <a class="dropdown-item" href="<?= site_url('Profile/password'); ?>"><i class="fa fa-cog"></i> ubah sandi</a>
                            <a class="dropdown-item" href="<?= site_url('Auth/logout'); ?>"><i class="fa fa-sign-out-alt"></i> keluar</a>
                        </div>
                        </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid" style="margin-top: 80px;">
        <?= $content; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <!--<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <!--<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>-->
    <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });


        $(document).ready(function() {
            $('#table1').DataTable()
        })
    </script>
</body>

</html>