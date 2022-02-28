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
      <a class="navbar-brand text-white" href="<?= site_url('Auth;') ?>">
        <img src="<?= base_url('assets/'); ?>img/logo.png" width="30"> Kuliner Magelang
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
          <?php if ($this->uri->segment(1) == 'Login') {
            echo '<li class="nav-item active">';
          } else {
            echo '<li class="nav-item">';
          }
          ?>
          <a class="nav-link" href="<?= site_url('Auth/Login'); ?>"><i class="fa fa-user-lock"></i> Login</a>
          </li>
          <?php if ($this->uri->segment(1) == 'Regis') {
            echo '<li class="nav-item active">';
          } else {
            echo '<li class="nav-item">';
          }
          ?>
          <a class="nav-link" href="<?= site_url('Auth/Regis'); ?>"><i class="fa fa-user-plus"></i> Register</a>
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